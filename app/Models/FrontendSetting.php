<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FrontendSetting extends Model implements  HasMedia
{
    use InteractsWithMedia,HasFactory;

    protected $table = 'frontend_settings';
    protected $fillable = [
        'type','key','status','value'
    ];

    protected $casts = [
        'status'     => 'integer',
    ];
    public static function getValueByKey($key)
    {
        $setting = self::where('key', $key)->first();

        return $setting ? json_decode($setting->value) : null;
    }
}
