<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeMobil extends Model
{
     protected $table = 'tipe_mobil';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'name',
        'order_no',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];
}
