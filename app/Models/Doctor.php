<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_doctors');
    }


}
