<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function getTime($id){
    	$time = Time::where('id', $id)->first();
    	return $time ? $time->time : '';
    }
}
