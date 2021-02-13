<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function semester(){
        return $this->belongsTo(Semester::class,'semesterId','id');
    }
}
