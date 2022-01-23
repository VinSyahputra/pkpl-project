<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'data' => $this->userModel->showData()
        ];
        return view('User/index', $data);
    }

    public function tambah_user()
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('User/tambah', $data);
    }

    public function ubah_user($id)
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'validation' => \Config\Services::validation(),
            'data' => $this->userModel->showData($id)[0]
        ];
        return view('User/ubah', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_dash|is_unique[tb_user.username]|max_length[12]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha_dash' => '{field} diisi hanya huruf & tanpa spasi',
                    'is_unique' => '{field} sudah dipakai',
                    'max_length' => 'Panjang maksimal 12'
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
            return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'level' => '1',

        ];
        $this->userModel->save($data);
        session()->setFlashdata('pesan', 'Tambah data berhasil');
        return redirect()->to('/user');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
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
            return redirect()->to('/user/ubah/' . $id)->withInput()->with('validation', $validation);
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'id_user' => $id,
            'nama' => $this->request->getVar('nama'),
            'password' => md5($this->request->getVar('password')),

        ];
        $this->userModel->save($data);
        session()->setFlashdata('pesan', 'Ubah data berhasil');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan_error', 'Hapus data berhasil');
        return redirect()->to('/user');
    }
}
