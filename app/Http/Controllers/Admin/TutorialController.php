<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    /**
     * Menampilkan halaman petunjuk penggunaan aplikasi (hanya admin).
     */
    public function index()
    {
        return view('admin.tutorial.index');
    }
}
