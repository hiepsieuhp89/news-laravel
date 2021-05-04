<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChillCategorys;
use App\Models\News;

class Categorys extends Model
{
	/*
	protected $table = 'categorys';
	protected $fillable = [
        'name',
        'slug',
        'dataid',
    ];
	private $name;
	private $slug;
	private $dataid;
	public function __construct(){
		$name = '';
		$slug = '';
		$dataid = '';
	}
	*/
	public function chillCategorys(){
		return $this->hasMany(ChillCategorys::class,'categoryId','id');
	}
	public function news(){
		return $this->hasMany(News::class,'category','id');
	}
    use HasFactory;
}
