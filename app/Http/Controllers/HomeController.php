<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index(){
      $all_posts = Post::all();
      return view('home', compact('all_posts'));    // oppure return view('home')->with(['all_posts' => $all_posts]);
    }
}
