<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function secondDayName($id){
    	$secondDay = Day::where('id', $id)->first();
    	return $secondDay ? $secondDay->dayOne : '';
    }
}
