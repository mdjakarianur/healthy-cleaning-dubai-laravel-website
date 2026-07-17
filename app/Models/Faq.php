<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Faq extends Model
{
    use HasFactory,SoftDeletes;

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
        return $this->belongsTo('App\Models\ServiceCategory','category_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }
}
