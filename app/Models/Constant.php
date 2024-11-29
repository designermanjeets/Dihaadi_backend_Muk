<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Constant extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'constants';

    const CUSTOM_FIELD_MODEL = 'Modules\Constant\Models\Constant';

    protected $fillable = [
        'type',
        'name',
        'value',
        'sub_type',
        'status',
        'sequence',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Constant\database\factories\ConstantFactory::new();
    }

    protected function getTypeDataKeyValue($type)
    {
        $results = self::getAllConstant()->where('type', $type);

        $convertedArray = [];

        foreach ($results as $result) {
            $convertedArray[$result->name] = $result->value;
        }

        return $convertedArray;
    }

    protected function getTypeDataObject($type)
    {
        $results = self::getAllConstant()->where('type', $type);

        return $results->map(function ($row) {
            return [
                'id' => $row->name,
                'text' => $row->value,
            ];
        })->toArray();
    }

    /**
     * Get all the constant.
     *
     * @return mixed
     */
    public static function getAllConstant()
    {
        return Cache::rememberForever('constant.all', function () {
            return self::orderBy('sequence', 'ASC')->get();
        });
    }

    /**
     * Flush the cache.
     */
    public static function flushCache()
    {
        Cache::forget('constant.all');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            self::flushCache();
        });

        static::created(function () {
            self::flushCache();
        });

        static::deleted(function () {
            self::flushCache();
        });
    }
}
