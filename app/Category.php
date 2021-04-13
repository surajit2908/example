<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category  extends Model
{
    protected $table = 'category';
    public $fillable = ['title','parent_id'];


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }

    public function parent() {
        return $this->hasOne('App\Category','id','parent_id') ;
    }
}
