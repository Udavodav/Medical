<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Write extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function visit(){
        return $this->hasOne(Visit::class);
    }

}
