<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Department;

class Batch extends Model
{
    public function department(){
        return $this->belongsTo(Department::class,'deptId','id');
    }
}
