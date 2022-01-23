<?php

namespace App\Controllers;

class Master extends BaseController
{
    public function index()
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData()
        ];
        return view('Master/index', $data);
    }
    public function tambah()
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('Master/tambah', $data);
    }
    public function ubah($id)
    {
        if (session()->get('level') != 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'ruangan' => $this->ruanganModel->getData(),
            'data' => $this->ruanganModel->getData($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('Master/ubah', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tb_ruangan.nama_ruangan]',
                'errors' => [
                    'required' => '{field} ruangan harus diisi',
                    'is_unique' => '{field} ruangan sudah dipakai'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/master/tambah')->withInput()->with('validation', $validation);
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'nama_ruangan' => ucwords($this->request->getVar('nama')),
        ];
        $this->ruanganModel->save($data);
        session()->setFlashdata('pesan', 'Tambah data berhasil');
        return redirect()->to('/master');
    }

    public function update($id)
    {
        $currName = $this->ruanganModel->getData($id);
        if ($currName['nama_ruangan'] == $this->request->getVar('nama')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[tb_ruangan.nama_ruangan]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => $rule,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah dipakai'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/master/ubah/' . $id)->withInput()->with('validation', $validation);
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'id_ruangan' => $id,
            'nama_ruangan' => ucwords($this->request->getVar('nama')),

        ];
        $this->ruanganModel->save($data);
        session()->setFlashdata('pesan', 'Ubah data berhasil');
        return redirect()->to('/master');
    }

    public function delete($id)
    {
        $this->ruanganModel->delete($id);
        session()->setFlashdata('pesan_error', 'Hapus data berhasil');
        return redirect()->to('/master');
    }
}
