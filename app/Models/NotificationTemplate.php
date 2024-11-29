<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Constant;

class NotificationTemplate extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    const CUSTOM_FIELD_MODEL = 'App\Models\NotificationTemplate';

    protected $table = 'notification_templates';

    protected $fillable = [
        'name',
        'label',
        'description',
        'type',
        'status',
        'to',
        'bcc',
        'cc',
        'channels',
    ];

    protected $casts = [
        'channels' => 'array',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\NotificationTemplate\database\factories\NotificationTemplateFactory::new();
    }

    public function defaultNotificationTemplateMap()
    {
        return $this->hasOne(NotificationTemplateContentMapping::class, 'template_id', 'id')->where('language', 'en');
    }

    public function constant()
    {
        return $this->belongsTo(Constant::class, 'type', 'value')->where('type', 'notification_type');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
