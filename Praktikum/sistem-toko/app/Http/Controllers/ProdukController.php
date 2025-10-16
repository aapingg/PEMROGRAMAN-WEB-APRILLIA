<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index($angka)
    {
        if ($angka % 2 == 0) {
            $message = "Nilai ini adalah genap";
            $alertType = "success";
        } else {
            $message = "Nilai ini adalah ganjil";
            $alertType = "warning";
        }

        return view('produk5', [
            'message' => $message,
            'alertType' => $alertType
        ]);
    }
}
