<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Faker\Provider\Base;

use function PHPUnit\Framework\returnSelf;

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
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('login', $data);
    }

    public function rulesLogin() {
        $setRules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'email harus diisi',
                    'valid_email' => 'Email anda tidak valid'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ]

        ];

        return $setRules;
    }

    public function prosesLogin() {

        if($this->validate($this->ruleslogin())) {
            $query = $this->model->where('email', $this->request->getPost('email'));
            $count = $query->countAllResults(false);
            $data = $query->get()->getRow();

            if($count > 0) {
                $hashPassword = $data->password;

                if(password_verify($this->request->getPost('password'), $hashPassword)) {

                    $session = [
                        'role' => $data->role,
                        'logged_in' => TRUE,
                    ];

                    session()->set($session);

                    return redirect()->to(base_url('home'));
            
                } else {
                    return redirect()->to(base_url('login'))->with('login_failed', 'Username / Password anda salah');
                }
                
            } else {
                return redirect()->to(base_url('login'))->with('login_failed', 'Username tidak ditemukan');
            }            
        } else {
            
            return redirect()->to(base_url('login'))->with('login_failed', 'salah');
        }

        // dd('ada');


        // $data = [
        //     'email' => $this->request->getPost('email'),
        //     'password' => $this->request->getPost('password'),
        // ];
        // // Validasi

        // $validation = \Config\Services::validation();

        // $validation->setRules([
        //     'email' => 'required|valid_email',
        //     'password' => 'required',
        // ]);

        // // Cek Validasi

        // if($validation->run($data)) {
        //     // $this->model->save([
        //     //     'name' => $data['nama'],
        //     //     'email' => $data['email'],
        //     //     'password' => password_hash($data['password'], PASSWORD_BCRYPT),
        //     //     'role' => 'siswa'
        //     // ]);

        //     return redirect()->to(base_url('login'))->with('sukses', 'Registrasi berhasil !');
        // } else {
        //     $errorMessages = $validation->getErrors();
        //     print_r($errorMessages);
        //     return redirect()->to(base_url('login'))->with('gagal', $errorMessages);
        // }
    }

   

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }

    
}
