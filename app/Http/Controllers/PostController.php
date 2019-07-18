<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function show($slug){
      $post = Post::where('slug', $slug)->first();
      if (empty($post)) {
        abort(404);
      };
      return view('posts.show', compact('post'));
    }

    public function showCategory($slug){
      $category = Category::where('slug', $slug)->first();
      if (empty($category)) {
        abort(404);
      };
      $posts = $category->posts;   // recupero tutti i post che hanno quella categoria
      return view('posts.category')->with(['posts' => $posts, 'category' => $category]);
    }
}
