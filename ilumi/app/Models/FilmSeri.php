<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmSeri extends Model
{
    protected $table = 'film_seri';

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

    protected $casts = [
        'order_no' => 'integer',
        'created_date' => 'datetime',
        'modified_date' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (FilmSeri $filmSeri) {
            $filmSeri->created_by = auth()->user()?->name ?? 'admin';
            $filmSeri->created_date = now();
        });

        static::updating(function (FilmSeri $filmSeri) {
            $filmSeri->modified_by = auth()->user()?->name ?? 'admin';
            $filmSeri->modified_date = now();
        });
    }
}
