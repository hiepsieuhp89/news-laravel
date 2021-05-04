<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChillCategorys extends Model
{
    use HasFactory;
    public function category(){
		return $this->beLongsTo('App\Models\Categorys','categoryId','id');
	}
	public function news(){
		return $this->hasMany(News::class,'chill_category','id');
	}
}
