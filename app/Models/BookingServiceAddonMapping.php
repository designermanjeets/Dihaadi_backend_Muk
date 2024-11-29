<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingServiceAddonMapping extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'booking_service_addon_mapping';
    protected $fillable = [
        'booking_id','service_addon_id','name','price','status'
    ];
    
    protected $casts = [
        'booking_id'    => 'integer',
        'service_addon_id' => 'integer',
        'price'   => 'double',
    ];
    public function AddonserviceDetails(){
        return $this->belongsTo(ServiceAddon::class, 'service_addon_id','id');
    }
    
}
