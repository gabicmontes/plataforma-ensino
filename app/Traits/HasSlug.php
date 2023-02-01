<?php

namespace App\Traits;

use App\Services\TranslateService;
use Illuminate\Support\Facades\Log;

trait HasSlug {

    protected static function bootHasSlug()
    {
        static::creating(function ($model) {
            $text = $model->name ?? $model->title ?? $model->description;
            $translated = TranslateService::translate($text, 'pt_Br', 'en');
            $model->slug = str_replace(' ', '-', strtolower($translated));
        });
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
}
