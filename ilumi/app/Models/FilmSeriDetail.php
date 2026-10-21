<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmSeriDetail extends Model
{
    protected $table = 'film_seri_detail';

    protected $fillable = [
        'kode_seri',
        'product_name',
        'description',
        'image',
        'tser',
        'VLT',
        'black',
        'clear',
        'ir_rejection_1400',
        'ir_rejection_900',
        'uv_rejection',
        'privacy_level',
        'visibilitas_malam',
        'tolak_panas',
        'category',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];

    public $timestamps = false;

    protected $casts = [
        'tser' => 'integer',
        'VLT' => 'integer',
        'black' => 'integer',
        'clear' => 'integer',
        'ir_rejection_1400' => 'integer',
        'ir_rejection_900' => 'integer',
        'uv_rejection' => 'integer',
        'created_date' => 'datetime',
        'modified_date' => 'datetime',
    ];

    public function filmSeri(): BelongsTo
    {
        return $this->belongsTo(
            FilmSeri::class,
            'kode_seri',
            'kode'
        );
    }

    protected static function booted(): void
    {
        static::creating(function (FilmSeriDetail $product) {
            $product->created_by = auth()->user()?->name ?? 'admin';
            $product->created_date = now();
        });

        static::updating(function (FilmSeriDetail $product) {
            $product->modified_by = auth()->user()?->name ?? 'admin';
            $product->modified_date = now();
        });
    }
}

