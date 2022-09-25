<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SiswaController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    public function __construct() 
    {
        $this->model = new \App\Models\UserModel();
    }

    public function index()
    {
        $datasiswa = $this->model->where('role', 'siswa')->findAll();
        return view('siswa/index', ['siswa' => $datasiswa]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $datasiswa = $this->model->where('id', $id)->first();
        return view('siswa/show', ['siswa' => $datasiswa]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('siswa/form-tambah');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'nis' => $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash('pw123', PASSWORD_BCRYPT),
            'role' => 'siswa'
        ];

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required',
            'nis' => 'required|is_unique[users.nis]',
            'email' => 'required|valid_email|is_unique[users.email]',
        ]);

        if($validation->run($data)) {

            $this->model->insert($data);
            return redirect()->to(base_url('siswa/new'))->with('sukses', 'Data berhasil ditambahkan !');
            
        } else {
            $errorMessages = $validation->getErrors();
            return redirect()->to(base_url('siswa/new'))->with('gagal', $errorMessages);
        }

        // print_r($data);
       

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $datasiswa = $this->model->where('id', $id)->first();
        return view('siswa/form-edit', ['siswa' => $datasiswa]);
 
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'nis' => $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
        ];

        $this->model->where('id', $id)->set($data)->update();
        return redirect()->to(base_url('siswa'));
        
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $this->model->delete($id);
        return redirect()->to(base_url("siswa"));
    }
}
