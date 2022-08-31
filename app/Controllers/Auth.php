<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        
    }

    public function login()
    {
        if (session('id_user'))
            {
                return redirect()->to(site_url('home'));
            }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        if ($post['email']=="admindata@pusdatin.kemdikbud.go.id")
        {
            if ($post['password']=='P4ssW0rd_4dm1N#D@T@')
            {
                $params = ['id_user'=>"admin"];
                session()->set($params);
                return redirect()->to(site_url('home'));
            }
            else
            {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
            
        }
        else
        {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
        
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('home'));
    }
}
