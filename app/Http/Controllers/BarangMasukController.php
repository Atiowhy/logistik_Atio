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
        $id_barang = $items->id ?? '';
        $id_barang++;
        $kd_barang = "KD" . "-" . date('dmY') . "/" . sprintf("%03s", $id_barang);
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
            "id_barang" => $items->id,
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
            "foto" => $request->foto,
        ]);

        // simpan data ke table items_in
        $item_in = items_in::create([
            "id_barang" => $item->id,
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
        $title = "Detail Data";
        $detail = items::findOrFail($id);
        // return $detail;
        return view('barangMasuk.detail', compact('title', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Data Barang";
        $dataBarang = items::findOrFail($id);
        return view('barangMasuk.edit', compact('title', 'dataBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataEdit = items::findOrFail($id);

        // cek data foto
        if($request->hasFile('foto')){
            // hapus jika ada
            if($dataEdit->foto){
                $oldImagePath = public_path('image/'.$dataEdit->foto);
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
            }

            // upload foto baru
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $dataEdit->foto = $imageName;
        }

        $dataEdit->nama_barang = $request->nama_barang;
        $dataEdit->origin = $request->origin;
        $dataEdit->qty = $request->qty;
        $dataEdit->deskripsi = $request->deskripsi;
        $dataEdit->save();

        return redirect()->to('barangmasuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        items::findOrFail($id)->delete();
        return redirect()->to('barangmasuk');
    }
}