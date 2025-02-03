<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function indexAdmin()
    {
        return view('auth.login-admin');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $goTo = 'login';
        $segment = $request->segment(1);
        if ($segment == 'admin') {
            $goTo = 'admin.login';
        }
        if (!$request->validate([
            'username' => 'required'
        ], [
            'username' => 'Username tidak boleh kosong'
        ])) {
            return redirect()->to(route($goTo));
        };
        $user = $this->user->getDatabyUsername($data['username']);
        if ($user) {
            if ($segment == 'admin' && $user->id_group != 1) {
                return redirect()->to(route('admin.login'))->withErrors(['error' => 'Username atau Password Salah!']);
            }
            $verifPassword = Hash::check($data['password'], $user->password);
            if ($verifPassword) {
                $sessionData = [
                    'nama'     => $user->nama,
                    'username' => $user->username,
                    'group'    => $user->id_group,
                    'color'    => dechex(rand(0x000000, 0xFFFFFF)),
                    'login'    => true
                ];
                session($sessionData);
                $goTo = 'app';
                if ($segment == 'admin' || session()->get('group') == 1) {
                    $goTo = 'dashboard';
                }
                return redirect()->to(route($goTo))->withErrors(['success' => "Selamat datang $user->nama"]);
            } else {
                return redirect()->to(route($goTo))->withErrors(['error' => 'Username atau Password Salah!']);
            }
        } else {
            return redirect()->to(route($goTo))->withErrors(['error' => 'User tidak terdaftar!']);
        }
    }

    public function indexRegister()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        if (!$request->validate([
            'nama' => 'required',
            'username' => 'unique:user'
        ], [
            'nama' => 'Nama user tidak boleh kosong',
            'username' => 'Username yang digunakan sudah ada'
        ])) {
            return redirect()->to(route('register'))->withInput();
        };
        $data = $request->all();
        $save = $this->user->insertOrUpdate($data);
        if (!empty($save)) {
            $sessionData = [
                'nama'     => $save->nama,
                'username' => $save->username,
                'group'    => $save->id_group,
                'color'    => dechex(rand(0x000000, 0xFFFFFF)),
                'login'    => true
            ];
            session($sessionData);
            return redirect()->to(route('app'));
        } else {
            return redirect()->to(route('register'))->withErrors(['msg' => 'Error', 'error' => 'Pendaftaran Gagal']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->to('/');
    }
}
