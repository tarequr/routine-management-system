<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function getRoom($id){
    	$room = Room::where('id', $id)->first();
    	return $room ? $room->roomNo : '';
    }
}
