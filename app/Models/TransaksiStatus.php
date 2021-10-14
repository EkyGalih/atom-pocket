<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    protected $table = "transaksi_status";

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
