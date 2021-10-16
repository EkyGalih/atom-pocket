<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Http\Requests\LaporanValidasi;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanValidasi $request)
    {
        $data = $request->all();

        $tanggal = $data['tgl_awal'] . ' - ' . $data['tgl_akhir']; // Buat variabel tanggal untuk menampilkan range tanggal laporan yang sudah ditentukan

        // Membuat kondisi untuk menampilkan data sesuai dengan inputan yang telah di lakukan
        $query_dompet = $data['dompet_id'] != 'all' ? $data['dompet_id'] : null; // jika dompet tidak seleksi semua, maka tentukan value untuk seleksi data

        $query_kategory = $data['kategori_id'] != 'all' ? $data['kategori_id'] : null; // jika kategori tidak di seleksi semua, maka tentukan value untuk seleksi data

        // Buat kondisi ketika untuk pengecekan status yang di pilih oleh user, kondisi ini akan mengecek jika user memilih salah 1 dari status
        if (count($data['status']) == 1) {

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

                        // pencarian akan di lakukan berdasarkan kondisi jika terpenuhi
                        ->when($query_dompet, function ($laporan, $query_dompet) {
                            return $laporan->where('dompet.id', $query_dompet);
                        })
                        ->when($query_kategory, function ($laporan, $query_kategory) {
                            return $laporan->where('kategori.id', $query_kategory);
                        })

                        ->where('transaksi_status.status_transaksi', '=', $data['status'][0])
                        ->get();

        } else {

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

                            // Pencarian akan di lakukan berdasarkan kondisi jika terpenuhi
                            ->when($query_dompet, function ($laporan, $query_dompet) {
                                return $laporan->where('dompet.id', $query_dompet);
                            })
                            ->when($query_kategory, function ($laporan, $query_kategory) {
                                return $laporan->where('kategori.id', $query_kategory);
                            })
                            ->get();

            }

        // Kondisi Pengecekan jika tidak ada record laporan dalam rentang waktu yang di pilih
        if ($laporan->isEmpty()) {

            return redirect()->back()->with(['warning' => 'Tidak Ada Laporan Pada Rentang '. $tanggal]);

        }


        // membuat operator penjumlahan untuk masing-masing transaksi masuk dan transaksi keluar untuk di tampilkan
        $total_masuk = $laporan->where('status_transaksi', '=', 'Masuk')->sum('nilai');
        $total_keluar = $laporan->where('status_transaksi', '=', 'Keluar')->sum('nilai');

        $total = ($total_masuk + $total_keluar); // Hitung total pengeluaran dan pemasukkan dan di tampung ke dalam variabel total

        // membuat kondisi untuk menentukan return mana yang akan di jalankan
        if ($data['click'] == 'Buat Laporan') {

            return view('laporan.detail', ['laporan' => $laporan, 'tanggal' => $tanggal, 'total_masuk' => $total_masuk, 'total_keluar' => $total_keluar, 'total' => $total]);

        } elseif ($data['click'] == 'Buat Ke Excel') {

            ob_end_clean();
            ob_start();

            // return view('laporan.export', ['laporan' => $laporan, 'tanggal' => $tanggal, 'total_masuk' => $total_masuk, 'total_keluar' => $total_keluar, 'total' => $total]);
            return Excel::download(new LaporanExport($laporan, $tanggal, $total_masuk, $total_keluar, $total), 'Laporan Transaksi.xlsx');
        }

    }

}
