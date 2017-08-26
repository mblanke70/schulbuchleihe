<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booktitle extends Model
{  
    public function books()
    {
    	return $this->hasMany('App\Book');
    }

    public function booklists()
    {
    	return $this->belongsToMany('App\Booklist');
    }  
}