<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklist extends Model
{
    public function booktitles()
    {
    	return $this->belongsToMany(Booktitle::class);
    } 
}
