<?php

namespace App\Http\Controllers;

use App\Http\Requests\DompetValidasi;
use App\Models\Dompet;
use App\Models\DompetStatus;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class DompetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status_transaksi = null)
    {
        $status = $status_transaksi != null ? $status_transaksi : '';

        // Query data dari tabel dompet dan tabel dompet_status untuk ditampilkan
        $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                    ->select(
                        'dompet.id as dompet_id',
                        'dompet.*',
                        'dompet_status.*'
                    )
                    ->orderBy('nama', 'asc')
                    ->get();

        return view('dompet.index', ['dompet' => $dompet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dompet.form_dompet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DompetValidasi $request)
    {
        $dompet = $request->all(); // konversi data dari objek ke array, agar dapat di input ke database

        $id = (string)Uuid::generate(4); // Buat variabel $id untuk menampung data UUID

        DompetStatus::create([
            'ID' => $id
        ]);

        Dompet::create([
            'ID' => (string)Uuid::generate(4), // Generate UUID untuk ID tabel Dompet
            'nama' =>$dompet['nama'],
            'referensi' =>$dompet['referensi'],
            'deskripsi' =>$dompet['deskripsi'],
            'status_ID' =>$id
        ]);

        return redirect()->route('dompet')->with(['success' => 'Dompet Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                            ->select(
                                'dompet.id as dompet_id',
                                'dompet.*',
                                'dompet_status.*'
                            )
                            ->where('dompet.status_ID', '=', $id)
                            ->first();

        return view('dompet.detail', ['show_dompet' => $show_dompet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Query data dari tabel dompet dan tabel dompet_status untuk ditampilkan berdasarkan ID yang di ambil
        $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                    ->select(
                        'dompet.id as dompet_id',
                        'dompet.*',
                        'dompet_status.*'
                    )
                    ->where('dompet.id', '=', $id)
                    ->first();

        return view('dompet.form_dompet', ['edit_dompet' => $dompet]);
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
        $dompet = $request->all();

        // Query untuk update data dalam 2 (dua) tabel sekaligus berdasarkan dompet id
        Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
            ->where('dompet.id', '=', $id)
            ->update([
                'nama' => $dompet['nama'],
                'referensi' => $dompet['referensi'],
                'deskripsi' => $dompet['deskripsi'],
                'status_dompet' => $dompet['status_dompet'],
            ]);

        return redirect()->route('dompet')->with(['success' => 'Dompet Berhasil Diupdate!']);
    }

    /**
     * Ubah status berdasarkan data yang dipilih
    */
    public function ubah_status($id)
    {
        $dompet = DompetStatus::findOrFail($id);  // Select data berdasarkan status_ID

        // Buat Kondisi Untuk Mengubah status
        if ($dompet->status_dompet == 'Aktif')
        {
            DompetStatus::where('id', '=', $id)
                ->update(['status_dompet' => 'Tidak Aktif']);
        } else {
            DompetStatus::where('id', '=', $id)
                ->update(['status_dompet' => 'Aktif']);
        }

        return redirect()->route('dompet')->with(['success' => 'Status Dompet Diubah!']);
    }

}
