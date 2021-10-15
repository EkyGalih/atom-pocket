<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Http\Requests\LaporanValidasi;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
            ->select('dompet.id as dompet_id', 'nama')
            ->where('status_dompet', '=', 'Aktif')
            ->orderBy('nama', 'asc')
            ->get(); // query untuk select semua dompet dengan pengurutan nama ascending

        $kategori = Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
            ->select('kategori.id as kategori_id', 'nama')
            ->where('status_kategori', '=', 'Aktif')
            ->orderBy('nama', 'asc')
            ->get(); // query untuk select semua kategori dengan pengurutan nama ascending

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
    public function show(LaporanValidasi $request)
    {
        $data = $request->all();

        $tanggal = $data['tgl_awal'] . ' - ' . $data['tgl_akhir']; // Buat variabel tanggal untuk menampilkan range tanggal laporan yang sudah ditentukan

        $laporan = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('kategori', 'transaksi.kategori_ID', '=', 'kategori.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->select(
                            'dompet.ID as dompet_id',
                            'kategori.ID as kategori_id',
                            'transaksi.tanggal',
                            'transaksi.kode',
                            'dompet.deskripsi',
                            'dompet.nama as nama_dompet',
                            'kategori.nama as nama_kategori',
                            'transaksi.nilai',
                            'transaksi_status.status_transaksi'
                            )
                        ->whereBetween('tanggal', [$data['tgl_awal'], $data['tgl_akhir']])
                        ->get();

        // Membuat kondisi untuk menampilkan data sesuai dengan inputan yang telah di lakukan
        if (count($data['status']) == 2) {
            $laporan->where('status_transaksi', '=', 'Masuk')->Where('status_transaksi', '=', 'Keluar');
        } elseif (count($data['status']) == 1) {
            if ($data['status'] == 'Masuk') {
                $laporan->where('status_transaksi', '=', 'Masuk');
            } else {
                $laporan->where('status_transaksi', '=', 'Keluar');
            }
        } elseif ($data['dompet_id'] != 'all') {
            $laporan->where('dompet_id', '=', $data['dompet_id']);
        } elseif ($data['kategori_id'] != 'all') {
            $laporan->where('kategori_id', '=', $data['kategori_id']);
        }

        // membuat operator penjumlahan untuk masing-masing transaksi masuk dan transaksi keluar untuk di tampilkan
        $total_masuk = $laporan->where('status_transaksi', '=', 'Masuk')->sum('nilai');
        $total_keluar = $laporan->where('status_transaksi', '=', 'Keluar')->sum('nilai');

        $total = ($total_masuk + $total_keluar); // Hitung total pengeluaran dan pemasukkan dan di tampung ke dalam variabel total

        // membuat kondisi untuk menentukan return mana yang akan di jalankan
        if ($data['click'] == 'Buat Baru') {
            return view('laporan.detail', ['laporan' => $laporan, 'tanggal' => $tanggal, 'total_masuk' => $total_masuk, 'total_keluar' => $total_keluar, 'total' => $total]);
        } else {
            ob_end_clean();
            ob_start();
            // return view('laporan.export', ['laporan' => $laporan, 'tanggal' => $tanggal, 'total_masuk' => $total_masuk, 'total_keluar' => $total_keluar, 'total' => $total]);
            return Excel::download(new LaporanExport($laporan, $tanggal, $total_masuk, $total_keluar, $total), 'Laporan Transaksi.xlsx');
        }
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
