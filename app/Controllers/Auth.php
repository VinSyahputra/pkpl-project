<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('Auth/login', $data);
    }

    public function login_validation()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha_dash' => '{field} diisi hanya huruf & tanpa spasi',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'panjang {field} minimal 8',
                ]
            ],
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/auth/login'))->withInput()->with('validation', $validation);
        }


        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        // $password = $this->request->getVar('password');
        $check = $this->userModel->login($username, $password);
        if ($check) {
            session()->set('login', true);
            session()->set('id', $check['id_user']);
            session()->set('username', $check['username']);
            session()->set('nama', $check['nama']);
            session()->set('level', $check['level']);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('pesan', 'Username atau Password Salah');
            return redirect()->to(base_url('/auth/login'));
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/auth/login');
    }

    public function settings($id)
    {
        if ($id != session()->get('id')) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'validation' => \Config\Services::validation(),
            'data' => $this->userModel->showData2($id),
        ];
        return view('/Settings/index', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'panjang {field} minimal 8',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/settings/' . $id)->withInput()->with('validation', $validation);
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'id_user' => $id,
            'password' => md5($this->request->getVar('password')),

        ];
        $this->userModel->save($data);
        return redirect()->to('/dashboard');
    }
}
