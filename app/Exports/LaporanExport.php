<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromView, ShouldAutoSize
{
   use Exportable;

   protected $laporan;
   protected $tanggal;
   protected $total_masuk;
   protected $total_keluar;
   protected $total;

   public function __construct($laporan, $tanggal, $total_masuk, $total_keluar, $total)
   {
        $this->laporan = $laporan;
        $this->tanggal = $tanggal;
        $this->total_masuk = $total_masuk;
        $this->total_keluar = $total_keluar;
        $this->total = $total;
   }

   public function view(): View
   {
    return view('laporan.export', ['laporan' => $this->laporan, 'tanggal' => $this->tanggal, 'total_masuk' => $this->total_masuk, 'total_keluar' => $this->total_keluar, 'total' => $this->total]);
   }
}
