<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function __construct() {
        $this->model = new \App\Models\UserModel();
    }

    public function registrasi() {
        return view('registrasi');
    }

    public function simpanRegistrasi() {
        // return redirect()->to(base_url('registrasi'));
        // Ambil data
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'confirm_pass' => $this->request->getPost('confirm_pass'),
        ];
        // Validasi

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'confirm_pass' => 'required|matches[password]',
        ]);

        // Cek Validasi

        if($validation->run($data)) {
            $this->model->save([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_BCRYPT),
                'role' => 'siswa'
            ]);

            return redirect()->to(base_url('registrasi'))->with('sukses', 'Registrasi berhasil !');
        } else {
            $errorMessages = $validation->getErrors();
            print_r($errorMessages);
            return redirect()->to(base_url('registrasi'))->with('gagal', $errorMessages);
        }
        

    }

    public function login() {
        return view('login');
    }

    public function prosesLogin() {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        // Validasi

        $validation = \Config\Services::validation();

        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        // Cek Validasi

        if($validation->run($data)) {
            // $this->model->save([
            //     'name' => $data['nama'],
            //     'email' => $data['email'],
            //     'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            //     'role' => 'siswa'
            // ]);

            return redirect()->to(base_url('login'))->with('sukses', 'Registrasi berhasil !');
        } else {
            $errorMessages = $validation->getErrors();
            print_r($errorMessages);
            return redirect()->to(base_url('login'))->with('gagal', $errorMessages);
        }
    }

    public function logout() {

    }

    
}
