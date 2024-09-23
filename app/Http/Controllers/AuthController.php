<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;

class AuthController extends Controller
{
    public function promptLogin()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $data = $request->all();
        
        if (!$request->validate([
            'username' => 'required'
        ], [
            'username' => 'Username tidak boleh kosong'
        ])) {
            return redirect()->to(route('login'));
        };
        
        $user = $this->user->getDatabyUsername($data['username']);
        if ($user) {
            $verifPassword = Hash::check($data['password'], $user->password);
            if ($verifPassword) {
                $sessionData = [
                    'nama'      => $user->nama,
                    'username'  => $user->username,
                    'group'     => $user->id_group,
                    'login'     => true
                ];

                Session::put($sessionData);
                if (Session::get('group') === 1) {
                    return redirect()->to(route('dashboard'))->withErrors(['msg' => 'Success', 'success' => "Selamat datang $user->nama"]);
                } else {
                    return redirect()->to(route('beranda'))->withErrors(['msg' => 'Success', 'success' => "Selamat datang $user->nama"]);
                }
            } else {
                return redirect()->to(route('login'))->withErrors(['error' => 'Username atau Password Salah!']);
            }
        } else {
            return redirect()->to(route('login'))->withErrors(['error' => 'User tidak terdaftar!']);
        }
    }

    public function actionLogout()
    {
        Session::flush();
        return redirect()->to('/');
    }
}
