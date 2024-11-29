<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    use HasFactory;
    protected $table = 'provider_service';
    protected $fillable = [ 'service_id', 'provider_id' ];

    protected $casts = [
        'service_id'   => 'integer',
        'provider_id'   => 'integer',
    ];
    
   
    public function providers(){
        return $this->belongsTo(User::class, 'provider_id','id');
    }
    public function services(){
        return $this->belongsTo(Service::class, 'service_id','id');
    }
}
