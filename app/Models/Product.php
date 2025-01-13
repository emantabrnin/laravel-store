<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    //
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function store(){
        return $this->belongsTo(store::class,'category_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function scopeActive(Builder $builder){
        return $builder->where('status','=','active');
    }
    protected static function booted(){

        static::addGlobalScope('store',function(Builder $builder){
         $user=Auth::user();
         if($user->store_id){
            $builder->where('store_id','=',$user->store_id);
         }
        });
    }
}
