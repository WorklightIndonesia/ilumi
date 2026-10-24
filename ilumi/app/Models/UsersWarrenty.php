<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersWarrenty extends Model
{
    protected $table = 'users_warrenty';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'ewarrenty',
        'status',
        'email',
        'whatsapp_no',
        'comment',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
    ];

    protected function casts(): array
    {
        return [
            'created_date' => 'datetime',
            'modified_date' => 'datetime',
        ];
    }

    public function warrenty(): BelongsTo
    {
        return $this->belongsTo(
            Warrenty::class,
            'ewarrenty',
            'ewarrenty_no'
        );
    }

    protected static function booted(): void
    {
        static::creating(function (UsersWarrenty $userWarrenty) {
            $now = now();

            $userWarrenty->created_by ??= auth()->user()?->name ?? 'system';
            $userWarrenty->created_date ??= $now;
        });

        static::updating(function (UsersWarrenty $userWarrenty) {
            $userWarrenty->modified_by = auth()->user()?->name ?? 'system';
            $userWarrenty->modified_date = now();
        });
    }
}
