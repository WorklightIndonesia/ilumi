<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $table = 'dealer';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'name',
        'alamat',
        'opening_hours',
        'city',
        'maps',
        'whatsappno',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];
}
