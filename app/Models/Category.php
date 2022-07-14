<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // default table- categories
    //protected $table = "categories";

    //protected $primaryKey = 'cat_id';

//    protected $perPage = 10;

    protected $fillable = ['title', 'slug','parent_id','image','status','created_by'];

    // Function and Relations
    // One - One , One to many, Many to one
    //Forward relation
    // Television =>

    public function productCounts(){

    }


    // one to one
    public function parentInfo(){
        //return $this->hasOne("App\Models\Category","id","parent_id");
        return $this->belongsTo("App\Models\Category","parent_id","id");
    }

    public function products(){
       // return $this->hasMany('Product);
       // return $this->belongsToMany('App\Models\Products','category_product')->count();

    }
}
