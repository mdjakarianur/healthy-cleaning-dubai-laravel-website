<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->create_by = Auth::user()->id;
        });
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\ServiceCategory::class, 'category_id');
    }

    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\CustomerInfo::class, 'customer_id');
    }

}
