<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section2 extends Model
{
    protected $table = 'section_2';

    protected $fillable = [
        'image',
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
        static::creating(function (Section2 $section) {
            $now = now();

            $section->created_by ??= auth()->user()?->name ?? 'system';
            $section->created_date ??= $now;
        });

        static::updating(function (Section2 $section) {
            $section->modified_by = auth()->user()?->name ?? 'system';
            $section->modified_date = now();
        });
    }
}
