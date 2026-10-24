<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $table = 'hero_sections';

    protected $fillable = [
        'image_background',
        'heading_1',
        'description',
        'cta_text',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'created_date' => 'datetime',
            'modified_date' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (HeroSection $heroSection) {
            $now = now();

            $heroSection->created_by ??= auth()->user()?->name ?? 'system';
            $heroSection->created_date ??= $now;
        });

        static::updating(function (HeroSection $heroSection) {
            $heroSection->modified_by = auth()->user()?->name ?? 'system';
            $heroSection->modified_date = now();
        });
    }
}
