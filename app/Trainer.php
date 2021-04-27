<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
