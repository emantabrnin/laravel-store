<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    use HasFactory;
    protected $guarded=[];

    public function products(){
        return $this->hasMany(Product::class ,'category_id','id');
    }

    public static function  rules(){
    return [
        'name' =>'required|string|min:3|max:255',
         'status' =>'in:active,archived else'
    ];
    }
}

