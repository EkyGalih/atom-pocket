<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DompetStatus extends Model
{
    protected $table = "dompet_status";

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
