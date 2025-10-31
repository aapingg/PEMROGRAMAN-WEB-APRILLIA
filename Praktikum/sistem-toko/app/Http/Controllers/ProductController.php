<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    
    /**
     * 
     * Display a listing of the resource.
     */
    public function index(){
        $data = Product::all();
        return view('master-data.product-master.index-product', compact('data'));
    }

    // public function index($angka)
    // {
    //     // angka bebas kamu tambahkan, misal +10
    //     $hasil = $angka + 11;

    //     // kirim ke view
    //     return view('produk', ['hasil' => $hasil]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:0',
            'producer' => 'required|string|max:255',
        ]);

        Product::create($validatedData);

        return redirect()->route('product-create')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('barang',['isi_data'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validasi = $request->validate([
    //         'product_name' => 'required|string|max:255',
    //         'unit' => 'required|string|max:50',
    //         'type' => 'required|string|max:50',
    //         'information' => 'nullable|string',
    //         'qty' => 'required|integer',
    //         'producer' => 'required|string|max:255',
    //     ]);

    //     $product = Product::findOrFail($id);
    //     $product->update([
    //         'product_name' => $request->product_name,
    //         'unit' => $request->unit,
    //         'type' => $request->type,
    //         'information' => $request->information,
    //         'qty' => $request->qty,
    //         'producer' => $request->producer
    //     ]
    //     );

    //     return redirect()->back()->with('success', 'data berhasil diperbarui');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validasi = $request->validate([
    //         'product_name' => 'required|string|max:255',
    //         'unit' => 'required|string|max:50',
    //         'type' => 'required|string|max:50',
    //         'information' => 'nullable|string',
    //         'qty' => 'required|integer',
    //         'producer' => 'required|string|max:255',
    //     ]);

    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'type' => $request->type,
            'information' => $request->information,
            'qty' => $request->qty,
            'producer' => $request->producer
        ]
        );

        return redirect()->back()->with('success', 'data berhasil diperbarui');
    }
    // public function destroy( string $id)
    // {
    //     $data = Product::findOrFail($id);
    //     $data->delete();

    //     return redirect()->back()->with('success', 'Data berhasil dihapus');
    // }

    public function destroy($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    
}
