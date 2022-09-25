<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WaifuController extends BaseController
{
    public function home()
    {
        return view('beranda.php');
    }

    public function infoKegiatan()
    {
        return view('infoKegiatan.php');
    }

    public function dataSiswa()
    {
        return view('dataSiswa.php');
    }

}
