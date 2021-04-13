<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'sub_category',
        'created_at'
    ];

    public function getCategory() {
        return $this->hasOne('App\Category','id','category') ;
    }
    public function getSubcategory() {
        return $this->hasOne('App\Category','id','sub_category') ;
    }
}
