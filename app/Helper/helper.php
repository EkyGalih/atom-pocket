<?php

namespace App\Helper;

class helper
{
    public static function kode_in()
    {
        $angka = '0123456789';

        $kode_in = substr('WIN'.str_shuffle($angka), 0, 9);

        return $kode_in;
    }

    public static function kode_out()
    {
        $angka = '0123456789';

        $kode_out = substr('WOUT'.str_shuffle($angka), 0, 10);

        return $kode_out;
    }
}
