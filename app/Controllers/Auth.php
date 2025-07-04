<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === '123456') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/quiz/level1');
        }

        return redirect()->to('/login')->with('error', 'Login gagal.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
