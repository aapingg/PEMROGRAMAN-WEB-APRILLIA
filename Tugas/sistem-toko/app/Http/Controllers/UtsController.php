<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtsController extends Controller
{
    public function index()
    {
        return view('uts.index');
    }

    // Halaman menu uts pemrograman web
    public function web()
    {
        return view('uts.web');
    }

    // Halaman menu uts database
    public function database()
    {
        return view('uts.database');
    }
}
