<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiValidasi;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use Webpatser\Uuid\Uuid;

class DompetKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query data dari tabel dompet_keluar
        $dompet_keluar = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->join('kategori', 'transaksi.kategori_ID', '=', 'kategori.id')
                        ->select(
                            'transaksi.id as transaksi_id',
                            'dompet.nama as nama_dompet',
                            'kategori.nama as kategori',
                            'transaksi.*',
                            'transaksi_status.*'
                        )
                        ->where('transaksi_status.status_transaksi', '=', 'Keluar')
                        ->get();

        return view('transaksi.dompet_keluar.index', ['dompet_keluar' => $dompet_keluar]);
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


       return view('transaksi.dompet_keluar.form_dompet', ['dompet' => $dompet, 'kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiValidasi $request)
    {
        $transaksi = $request->all();

        $id = (string)Uuid::generate(4); // variabel untuk menampung UUID, akan digunakan oleh 2 tabel

        TransaksiStatus::create([
            'ID' => $id,
            'status_transaksi' => 'Keluar'
        ]);

        Transaksi::create([
            'ID' => (string)Uuid::generate(4),
            'kode' => $transaksi['kode'],
            'deskripsi' => $transaksi['deskripsi'],
            'tanggal' => $transaksi['tanggal'],
            'nilai' => $transaksi['nilai'],
            'dompet_ID' => $transaksi['dompet_id'],
            'kategori_ID' => $transaksi['kategori_id'],
            'status_ID' => $id
        ]);

        return redirect()->route('dompet_keluar')->with(['success' => 'Transaksi Keluar Berhasil Disimpan!']);
    }
}
