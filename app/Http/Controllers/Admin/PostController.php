<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::all();
      return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
      $categories = Category::all();
      return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
      $rules = [
        'title' => 'required|unique:posts,title|max:255',
        'content' => 'required',
        'author' => 'required',
      ];
      $messages = [
        'title.required' => 'Inserisci il titolo del post',
        'title.unique' => 'Hai già inserito questo post',
        'content.required' => 'Inserisci il contenuto del post',
        'author.required' => 'Inserisci l\'autore'
      ];
      $validatedData = $request->validate($rules, $messages);

      $dati = $request->all();
      $dati['slug'] = Str::slug($dati['title']);
      $new_post = new Post();
      $new_post->fill($dati);
      $new_post->save();
      return redirect()->route('admin.posts.index');
    }

    public function show($post_id)
    {
      $post = Post::find($post_id);
      if(empty($post)){
        abort(404);
      }
      return view('admin.posts.show', compact('post'));
    }

    public function edit($post_id)
    {
      $post = Post::find($post_id);
      $categories = Category::all();
      $data = ['post' => $post, 'categories' => $categories];
      if(empty($post)){
        abort(404);
      }
      return view('admin.posts.edit', $data);
    }

    public function update(Request $request, $post_id)
    {
      $post = Post::find($post_id);

      $rules = [
        'title' => 'required|max:255',
        'content' => 'required',
        'author' => 'required',
      ];
      $messages = [
        'title.required' => 'Inserisci il titolo del post',
        'content.required' => 'Inserisci il contenuto del post',
        'author.required' => 'Inserisci l\'autore'
      ];
      $validatedData = $request->validate($rules, $messages);

      $dati = $request->all();
      $dati['slug'] = Str::slug($dati['title']);
      $post->update($dati);
      return redirect()->route('admin.posts.index');
    }

    public function destroy($post_id)
    {
      $post = Post::find($post_id);
      $post->delete();
      return redirect()->route('admin.posts.index');
    }
}
