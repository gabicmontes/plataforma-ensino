<?php

namespace App\Traits;

use App\Services\TranslateService;

trait HasSlug {

    protected static function bootHasSlug()
    {
        static::creating(function ($model) {
            $text = TranslateService::translate($model->description, 'pt_Br', 'en');
            $model->slug = str_replace(' ', '-', strtolower($text));
        });
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
}
