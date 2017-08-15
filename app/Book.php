<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function booktitle()
    {
    	return $this->belongsTo(Booktitle::class);
    }
    
}
