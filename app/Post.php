<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'content', 'author', 'slug', 'category_id'];

  // many to one con categorie
  public function category(){
    return $this->belongsTo('App\Category');
  }

  // many to many con tags
  public function tags(){
    return $this->belongsToMany('App\Tag');
  }
}
