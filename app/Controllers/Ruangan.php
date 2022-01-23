<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;


class Ruangan extends BaseController
{
    public function index($ruangan)
    {

        if ($this->ruanganModel->getDataID($ruangan) == null) {
            return redirect()->to('/dashboard');
        }

        //call function check_date
        $this->check_date();

        $data = [
            'nama_ruangan' => $ruangan,
            'ruangan' => $this->ruanganModel->getData(),
            'data' => $this->dataModel->getData($ruangan),
            'cp' => $this->userModel,
        ];

        return view('Ruangan/index', $data);
    }


    public function tambah_data($ruangan)
    {
        if ($this->ruanganModel->getDataID($ruangan) == null) {
            return redirect()->to('/dashboard');
        }
        //call function check_date
        $this->check_date();
        $data = [
            'validation' => \Config\Services::validation(),
            'nama_ruangan' => $ruangan,
            'ruangan' => $this->ruanganModel->getData(),
            'id' => $this->ruanganModel->getDataID($ruangan)
        ];
        return view('Ruangan/tambah', $data);
    }

    public function ubah_data($ruangan, $id)
    {

        if ($this->ruanganModel->getDataID($ruangan) == null) {
            return redirect()->to('/dashboard');
        }

        if (session()->get('level') != 2) {

            if (session()->get('id') != $this->dataModel->getData($ruangan, $id)[0]['id_user']) {
                return redirect()->to('/ruangan/' . $ruangan);
            }
        }
        //call function check_date
        $this->check_date();

        $data = [
            'validation' => \Config\Services::validation(),
            'nama_ruangan' => $ruangan,
            'ruangan' => $this->ruanganModel->getData(),
            'id' => $this->ruanganModel->getDataID($ruangan),
            'data' => $this->dataModel->getData($ruangan, $id)[0]
        ];

        return view('Ruangan/ubah', $data);
    }

    public function save($ruangan)
    {

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi',
                ]
            ],
            'cp' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => 'Contact Person harus diisi',
                    'max_length' => 'Melebihi batas inputan',
                ]
            ],
            'waktu_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu harus diisi',
                ]
            ],
            'waktu_berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu harus diisi',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/ruangan/tambah/' . $ruangan)->withInput()->with('validation', $validation);
        }

        $query = $this->dataModel->getData($ruangan);
        $mulai = Time::createFromFormat('H:i', $this->request->getVar('waktu_mulai'), 'Asia/Jakarta');
        $berakhir = Time::createFromFormat('H:i', $this->request->getVar('waktu_berakhir'), 'Asia/Jakarta');
        $validation = \Config\Services::validation();
        // echo $mulai . '<br>';
        // echo $berakhir;
        // if ($mulai > $berakhir) {
        //     echo 'salah';
        // } else {
        //     echo 'benar';
        // }
        foreach ($query as $query) {
            if ($query['tanggal'] == $this->request->getVar('tanggal')) {
                $date1 = Time::createFromFormat('H:i', $query['waktu_mulai'], 'Asia/Jakarta');
                $date2 = Time::createFromFormat('H:i', $query['waktu_berakhir'], 'Asia/Jakarta');

                if ($mulai > $berakhir) {
                    session()->setFlashdata('pesan', 'Tambah data gagal, pengisian waktu tidak sesuai');
                    return redirect()->to('/ruangan/tambah/' . $ruangan)->withInput()->with('validation', $validation);
                } else {
                    if (($mulai >= $date1 && $mulai < $date2) || ($berakhir > $date1 && $berakhir < $date2) || ($mulai <= $date1 && $berakhir >= $date2)) {
                        session()->setFlashdata('pesan', 'Tambah data gagal, ruangan sudah dibooking');
                        return redirect()->to('/ruangan/tambah/' . $ruangan)->withInput()->with('validation', $validation);
                    }
                }
            }
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'tanggal' => $this->request->getVar('tanggal'),
            'kontak' => $this->request->getVar('cp'),
            'id_ruangan' => $this->request->getVar('id_ruangan'),
            'id_user' => session()->get('id'),
            'waktu_mulai' => $this->request->getVar('waktu_mulai'),
            'waktu_berakhir' => $this->request->getVar('waktu_berakhir'),
            'keterangan' => $this->request->getVar('keterangan'),

        ];
        $this->dataModel->save($data);
        session()->setFlashdata('pesan', 'Tambah data berhasil');
        return redirect()->to('/ruangan/' . $ruangan);
    }

    public function update($ruangan, $id)
    {

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi',
                ]
            ],
            'cp' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => 'Contact Person harus diisi',
                    'max_length' => 'Melebihi batas inputan',
                ]
            ],
            'waktu_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu harus diisi',
                ]
            ],
            'waktu_berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu harus diisi',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/ruangan/ubah/' . $ruangan . '/' . $id)->withInput()->with('validation', $validation);
        }

        $query = $this->dataModel->getData($ruangan);
        $mulai = Time::createFromFormat('H:i', $this->request->getVar('waktu_mulai'), 'Asia/Jakarta');
        $berakhir = Time::createFromFormat('H:i', $this->request->getVar('waktu_berakhir'), 'Asia/Jakarta');

        // $CheckID = $this->dataModel->getData($ruangan, $id)[0];
        // dd($query);
        foreach ($query as $query) {

            if ($query['tanggal'] == $this->request->getVar('tanggal')) {
                $date1 = Time::createFromFormat('H:i', $query['waktu_mulai'], 'Asia/Jakarta');
                $date2 = Time::createFromFormat('H:i', $query['waktu_berakhir'], 'Asia/Jakarta');
                $validation = \Config\Services::validation();
                if ($mulai > $berakhir) {
                    session()->setFlashdata('pesan', 'Ubah data gagal, pengisian waktu tidak sesuai');
                    return redirect()->to('/ruangan/ubah/' . $ruangan . '/' . $id)->withInput()->with('validation', $validation);
                } else {
                    if (($mulai >= $date1 && $mulai < $date2) || ($berakhir > $date1 && $berakhir < $date2) || ($mulai <= $date1 && $berakhir >= $date2)) {
                        if ($query['id'] != $id) {
                            session()->setFlashdata('pesan', 'Ubah data gagal, ruangan sudah dibooking');
                            return redirect()->to('/ruangan/ubah/' . $ruangan . '/' . $id)->withInput()->with('validation', $validation);
                        }
                    }
                }
            }
        }


        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'id' => $id,
            'tanggal' => $this->request->getVar('tanggal'),
            'kontak' => $this->request->getVar('cp'),
            'id_ruangan' => $this->request->getVar('id_ruangan'),
            'waktu_mulai' => $this->request->getVar('waktu_mulai'),
            'waktu_berakhir' => $this->request->getVar('waktu_berakhir'),
            'keterangan' => $this->request->getVar('keterangan'),

        ];
        $this->dataModel->save($data);
        session()->setFlashdata('pesan', 'Ubah data berhasil');
        return redirect()->to('/ruangan/' . $ruangan);
    }

    public function delete($id)
    {
        $this->dataModel->delete($id);
        session()->setFlashdata('pesan_error', 'Hapus data berhasil');
        return redirect()->back();
    }

    public function check_date()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = Time::today('Asia/Jakarta');
        $a = Time::parse($today);

        $query = $this->dataModel->getData();
        foreach ($query as $query) {
            $date1 = Time::parse($query['tanggal'], 'Asia/Jakarta');

            $b = Time::parse($date1);
            $c = $a->difference($b);
            if ($c->getDays() < 0) {
                $this->delete($query['id']);
            }
        }
    }

    public function dataJSON()
    {
        helper('xml');
        $data = [
            'ruangan' => $this->dataModel->getRuangan(),
        ];
        return view('API/datajson', $data);
    }
    public function dataXML()
    {
        helper('xml');
        $data = [
            'ruangan' => $this->dataModel->getRuangan(),
        ];
        return view('API/dataxml', $data);
    }
}
