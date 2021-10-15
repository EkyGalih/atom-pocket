<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DompetMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query data dari tabel dompet_masuk
        $dompet_masuk = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                    ->select(
                        'transaksi.id as transaksi_id',
                        'transaksi.*',
                        'transaksi_status.*'
                    )
                    ->get();

        return view('transaksi.dompet_masuk.index', ['dompet_masuk' => $dompet_masuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Query select data dari tabel dompet
         $dompet = Dompet::select('id as dompet_id', 'nama')->get();

         // Query select data dari tabel kategori
         $kategori = Kategori::select('id as kategori_id', 'nama')->get();


        return view('transaksi.dompet_masuk.form_dompet', ['dompet' => $dompet, 'kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
