<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warrenty extends Model
{
    protected $table = 'warrenty';

    protected $primaryKey = 'ewarrenty_no';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'ewarrenty_no',
        'dealer_code',
        'tipe_mobil',
        'nomor_polisi',
        'front_film',
        'side_film1',
        'side_film2',
        'side_film3',
        'back_film',
        'sunroof_film',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_code', 'kode');
    }

    protected static function booted(): void
    {
        static::creating(function (Warrenty $warrenty) {
            $warrenty->created_by = auth()->user()?->name ?? 'admin';
            $warrenty->created_date = now();
        });

        static::updating(function (Warrenty $warrenty) {
            $warrenty->modified_by = auth()->user()?->name ?? 'admin';
            $warrenty->modified_date = now();
        });
    }
}
