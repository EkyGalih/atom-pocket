<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriValidasi;
use App\Models\Kategori;
use App\Models\KategoriStatus;
use Webpatser\Uuid\Uuid;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status_kategori = null)
    {
        $status = $status_kategori != null ? $status_kategori : '';


        // membuat kondisi untuk menampilkan filtering dompet aktif atau tidak aktif
        if ($status == null) {
            // Query data dari tabel kategori dan tabel kategori_status untuk ditampilkan
            $kategori = Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
                        ->select(
                            'kategori.id as kategori_id',
                            'kategori.*',
                            'kategori_status.*'
                        )
                        ->orderBy('nama', 'asc')
                        ->get();
        } else {
            // Query data dari tabel kategori dan tabel kategori_status untuk ditampilkan berdasarkan status yang dipilih
            $kategori = Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
                        ->select(
                            'kategori.id as kategori_id',
                            'kategori.*',
                            'kategori_status.*'
                        )
                        ->where('status_kategori', '=', $status)
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        return view('kategori.index', ['kategori' => $kategori, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.form_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\KategoriValidasi  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriValidasi $request)
    {
        $kategori = $request->all(); // konversi data dari object ke array

        $id = (string)Uuid::generate(4);

        // Query untuk insert data kategori ke database
        KategoriStatus::create([
            'ID' => $id,
            'status_kategori' => $kategori['status_kategori']
        ]);

        Kategori::create([
            'ID' => (string)Uuid::generate(4),
            'nama' => $kategori['nama'],
            'deskripsi' => $kategori['deskripsi'],
            'status_ID' => $id,
        ]);

        return redirect()->route('kategori')->with(['success' => 'Kategori Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_kategori = Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
                            ->select(
                                'kategori.id as kategori_id',
                                'kategori.*',
                                'kategori_status.*'
                            )
                            ->where('kategori.status_ID', '=', $id)
                            ->first();

        return view('kategori.detail', ['show_kategori' => $show_kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
                    ->select(
                        'kategori.id as kategori_id',
                        'kategori.*',
                        'kategori_status.*'
                    )
                    ->where('kategori.id', '=', $id)
                    ->first();

        return view('kategori.form_kategori', ['edit_kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriValidasi $request, $id)
    {
        $kategori = $request->all();

        // Query untuk update data dalam 2 (dua) tabel sekaligus berdasarkan dompet id
        Kategori::join('kategori_status', 'kategori.status_ID', '=', 'kategori_status.id')
            ->where('kategori.id', '=', $id)
            ->update([
                'nama' => $kategori['nama'],
                'deskripsi' => $kategori['deskripsi'],
                'status_kategori' => $kategori['status_kategori'],
            ]);

        return redirect()->route('kategori')->with(['success' => 'Kategori Berhasil Diubah!']);
    }

    /**
     * Ubah status berdasarkan data yang dipilih
    */
    public function ubah_status($id)
    {
        $dompet = KategoriStatus::findOrFail($id);  // Select data berdasarkan status_ID

        // Buat Kondisi Untuk Mengubah status
        if ($dompet->status_kategori == 'Aktif')
        {
            KategoriStatus::where('id', '=', $id)
                ->update(['status_kategori' => 'Tidak Aktif']);
        } else {
            KategoriStatus::where('id', '=', $id)
                ->update(['status_kategori' => 'Aktif']);
        }

        return redirect()->route('kategori')->with(['success' => 'Status Kategori Diubah!']);
    }
}
