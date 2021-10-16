<?php

namespace App\Helper;

class helper
{
    public static function kode_in()
    {
        $angka = '0123456789';

        $generate = substr(str_shuffle($angka), 0, 6);
        $kode_in = 'WIN'.$generate.'1';

        return $kode_in;
    }

    public static function kode_out()
    {
        $angka = '0123456789';

        $generate = substr(str_shuffle($angka), 0, 6);
        $kode_out = 'WOUT'.$generate.'2';

        return $kode_out;
    }
}
