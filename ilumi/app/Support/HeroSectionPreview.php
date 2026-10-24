<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HeroSectionPreview
{
    public static function createUrl(array $data): string
    {
        $token = Str::random(40);

        $imageBackground = $data['image_background'] ?? null;

        // Normalisasi state FileUpload Filament.
        if (is_array($imageBackground)) {
            $imageBackground = collect($imageBackground)
                ->filter(fn ($value) => is_string($value))
                ->first();
        }

        Cache::put(
            'hero-preview:' . $token,
            [
                'heading_1' => $data['heading_1'] ?? '',
                'description' => $data['description']
                    ?? $data['Deskripsi']
                    ?? '',
                'cta_text' => $data['cta_text'] ?? '',
                'image_background' => $imageBackground,
            ],
            now()->addMinutes(10)
        );

        return route('preview.hero-section', [
            'token' => $token,
        ]);
    }
}
