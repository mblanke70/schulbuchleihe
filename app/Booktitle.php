<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booktitle extends Model
{  
    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function booklists()
    {
    	return $this->belongsToMany(Booklist::class);
    }  
}