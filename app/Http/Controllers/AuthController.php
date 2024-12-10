<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private $titles = [
        'siswa' => ['title' => 'Login Siswa', 'placeholder' => 'Masukkan NISN'],
        'walikelas' => ['title' => 'Login Walikelas', 'placeholder' => 'Masukkan NIP'],
        'admin' => ['title' => 'Login Admin', 'placeholder' => 'Masukkan Nama Pengguna']
    ];

    // Menampilkan halaman tipe login
    public function showLoginTypes()
    {
        return view('auth.login-types', ['titles' => $this->titles]);
    }

    // Menampilkan form login berdasarkan tipe
    public function showLoginForm($type)
    {
        if (!array_key_exists($type, $this->titles)) {
            abort(404);
        }

        return view('auth.login-form', [
            'type' => $type,
            'title' => $this->titles[$type]['title'],
            'placeholder' => $this->titles[$type]['placeholder']
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'type' => 'required|in:siswa,walikelas,admin',
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $type = $request->type;
        $username = $request->username;
        $password = $request->password;

        $user = $this->authenticateUser($type, $username, $password);

        if ($user) {
            // Atur sesi untuk siswa dan wali kelas
            if ($type === 'siswa' || $type === 'walikelas') {
                session([
                    'user' => $user,
                    'role' => $type
                ]);

                return redirect()->intended('dashboard');
            }

            // Gunakan Auth untuk admin
            auth()->login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Pesan error jika login gagal
        $usernameLabel = match ($type) {
            'siswa' => 'NISN',
            'walikelas' => 'NIP',
            default => 'Username'
        };

        throw ValidationException::withMessages([
            'username' => ["{$usernameLabel} atau kata sandi salah. Silakan coba lagi."],
        ]);
    }


    /**
     * Authenticate user based on type
     */

    private function authenticateUser($type, $username, $password)
    {
        $model = match ($type) {
            'siswa' => Siswa::class,
            'walikelas' => Walikelas::class,
            'admin' => User::class,
            default => null
        };

        if (!$model) {
            return null;
        }

        $field = $this->getUsernameField($type);
        $user = $model::where($field, $username)->first();

        // Verifikasi login berdasarkan tipe
        if ($type === 'siswa' && $user && $user->nisn === $password) {
            return $user;
        }

        if ($type === 'walikelas' && $user && $user->nip === $password) {
            return $user;
        }

        if ($type === 'admin' && $user && \Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }


    private function getUsernameField($type)
    {
        return match ($type) {
            'siswa' => 'nisn',
            'walikelas' => 'nip',
            'admin' => 'username'
        };
    }

    // Logout dan hapus sesi
    public function logout()
    {
        // Menghapus sesi jika ada (untuk siswa dan walikelas)
        session()->forget('user');
        session()->forget('role');

        // Jika menggunakan Auth untuk admin
        auth()->logout();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('auth.login.types')->with('success', 'Logout berhasil!');
    }

}
