<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\items_in;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Barang Masuk";
        $datas = items::get();
        // return $datas;
        return view('barangMasuk.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Barang Masuk";
        $items = items::get()->last();
        $id_items = $items->kd_barang ?? '';
        $id_items++;
        $kd_barang =  sprintf("%03s", $id_items);
        return view('barangMasuk.create', compact('title', 'kd_barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek barang di database
        $items = items::where('kd_barang', $request->kd_barang)->first();

        if($items){
            //update qty jika barang sudah ada
            $items->qty += $request->qty;
            $items->save();

            $item_in = items_in::create([
            "kd_barang" => $request->kd_barang,
            "qty" => $request->qty,
            "origin" => $request->origin,
            "tanggal_masuk" => $request->tanggal_masuk,
        ]);
        } else {
// simpan data ke table items
        $item = items::create([
            "kd_barang" => $request->kd_barang,
            "nama_barang" => $request->nama_barang,
            "deskripsi" => $request->deskripsi,
            "qty" => $request->qty,
            "origin" => $request->origin,
        ]);

        // simpan data ke table items_in
        $item_in = items_in::create([
            "kd_barang" => $request->kd_barang,
            "qty" => $request->qty,
            "origin" => $request->origin,
            "tanggal_masuk" => $request->tanggal_masuk,
        ]);
        }

        return redirect()->to('barangmasuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
