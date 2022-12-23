<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use App\Controllers\BaseController;

class PDFController extends BaseController
{

    public function __construct() 
    {
        $this->model = new \App\Models\UserModel();
    }


    // public function index()
    // {
    //     return view('pdf_view');
    // }

    public function generatePDF() {
        // generate file name
        $filename = date('y-m-d-h-i-s'). 'data-siswa';

        $dompdf = new Dompdf();

        $datasiswa = $this->model->where('role', 'siswa')->findAll();

        $dompdf->loadHtml(view('siswa/export', ['siswa' => $datasiswa]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);

    }
}
