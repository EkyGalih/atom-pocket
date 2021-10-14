<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    protected $table = "dompet";

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
