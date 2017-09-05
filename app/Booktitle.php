<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Booktitle extends Model
{  
	use Sortable;

	public $sortable = ['id', 'titel', 'isbn', 'created_at'];

    public function books()
    {
    	return $this->hasMany('App\Book');
    }

    public function booklists()
    {
    	return $this->belongsToMany('App\Booklist');
    }  
}