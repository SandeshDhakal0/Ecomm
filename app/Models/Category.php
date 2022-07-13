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

}
