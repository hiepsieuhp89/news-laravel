<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class News extends Model
{
	use HasFactory;
	//use Searchable;
	public function searchableAs()
    {
        return 'id';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }
    public function getChillCategory(){
		return $this->beLongsTo('App\Models\ChillCategorys','chill_category','id');
	}
	public function getCategory(){
		return $this->beLongsTo('App\Models\Categorys','category','id');
	}
	public function author_created(){
		return $this->beLongsTo('App\Models\Authors','author','id');
	}
	public function source_created(){
		return $this->beLongsTo('App\Models\sources','source','id');
	}
}
