<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceAddon extends BaseModel implements  HasMedia
{
    use InteractsWithMedia,HasFactory,SoftDeletes;
    protected $table = 'service_addons';
    protected $fillable = [
        'name', 'service_id','price','status','created_by'
    ];
    protected $casts = [
        'service_id'    => 'integer',
        'price'         => 'double',
        'status'        => 'integer',
        'created_by'    => 'integer',
    ];
    public function service(){
        return $this->belongsTo(Service::class,'service_id', 'id');
    }
    public function scopeList($query)
    {
        return $query->orderBy('deleted_at', 'asc');
    }
    public function scopeServiceAddon($query)
    {
        if(auth()->user()->hasRole('admin')) {

            return $query;
        }

        if (auth()->user()->hasRole('provider')) {
            $user = auth()->user();
            
            if ($user->user_type == 'provider') {
                $providerId = $user->id;
                return $query->whereHas('service', function ($query) use ($providerId) {
                    $query->where('provider_id', $providerId);
                });
            }
        }
        return $query;
    }
   
}