<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'body'];

    public function comments(){
        return $this->hasMany('App\Comment'); 
    }

    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function category(){
        //投稿は一つのカテゴリーに属する
        return $this->belongsTo(\App\Category::class, 'category_id');
    }

}
