<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompet = Dompet::select('id as dompet_id', 'nama')->orderBy('nama', 'asc')->get(); // query untuk select semua dompet dengan pengurutan nama ascending

        $kategori = Kategori::select('id as kategori_id', 'nama')->orderBy('nama', 'asc')->get(); // query untuk select semua kategori dengan pengurutan nama ascending

        return view('laporan.index', ['dompet' => $dompet, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Request $request)
    {
        $data = $request->all();

        $laporan = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('kategori', 'transaksi.kategori_ID', '=', 'kategori.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->select(
                            'transaksi.tanggal',
                            'transaksi.kode',
                            'dompet.deskripsi',
                            'dompet.nama as nama_dompet',
                            'kategori.nama as nama_kategori',
                            'transaksi.nilai'
                            )
                        ->whereBetween('tanggal', [$data['tgl_awal'], $data['tgl_akhir']])
                        // ->where('transaksi_status.status_transaksi', '=', $data['status'])
                        // ->where('dompet.ID', '=', $data['dompet_id'])
                        // ->where('kategori.ID', '=', $data['kategori_id'])
                        ->get();

        return view('laporan.detail', ['laporan' => $laporan]);
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
