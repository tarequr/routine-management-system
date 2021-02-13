<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Routine extends Model
{
    public function btch(){
        return $this->belongsTo(Batch::class,'batchId','id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'deptId','id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'courseId','id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class,'semesterId','id');
    }
}
