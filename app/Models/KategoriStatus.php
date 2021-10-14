<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriStatus extends Model
{
    protected $table = "kategori_status";

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
