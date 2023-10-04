<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login/log_view');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $npm = $_POST['username'];
        $password = $_POST['password'];
        $data = $model->where('username', $npm)->first();
        if ($data) {
            $pass = $data['password'];
            $very = $model->where('password', $password)->first();
            if ($very) {
                $ses_data = [
                    'npm'       => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->keepFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'GAK ADA');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
