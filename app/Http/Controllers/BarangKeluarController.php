<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\items_out;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Barang Keluar';
        $datas = items_out::with('items')->get();
        // return $datas;
        return view('barangKeluar.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Input Barang Keluar';
        $dataBarang = items::get();
        return view('barangKeluar.create', compact('title', 'dataBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $item = items::where('kd_barang', $request->kd_barang)->first();
// return($item);
        if (!$item) {
        return redirect()->back()->with('error', 'Item tidak ditemukan');
    }

        if($request->qty > $item->qty){
            return redirect()->back()->with('error', 'Stok barang tidak cukup');
        }

        $item->qty -= $request->qty;
        $item->save();

        items_out::create([
            "id_barang" => $item->id,
            "qty" => $request->qty,
            "destination" => $request->destination,
            "tanggal_keluar" => $request->tanggal_keluar,
        ]);

        return redirect()->to('barangkeluar');
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