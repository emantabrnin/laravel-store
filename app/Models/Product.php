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
    // protected static function booted(){

    //     static::addGlobalScope('store',function(Builder $builder){
    //      $user=Auth::user();
    //      if($user->store_id){
    //         $builder->where('store_id','=',$user->store_id);
    //      }
    //     });
    // }

    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'store_id' => null,
            'category_id' => null,
            'tag_id' => null,
            'status' => 'active',
        ], $filters);

        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        $builder->when($options['store_id'], function($builder, $value) {
            $builder->where('store_id', $value);
        });
        $builder->when($options['category_id'], function($builder, $value) {
            $builder->where('category_id', $value);
        });
        $builder->when($options['tag_id'], function($builder, $value) {

            $builder->whereExists(function($query) use ($value) {
                $query->select(1)
                    ->from('product_tag')
                    ->whereRaw('product_id = products.id')
                    ->where('tag_id', $value);
            });

        });
    }
}
