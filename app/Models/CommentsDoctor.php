<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsDoctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
