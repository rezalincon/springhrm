<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
}
