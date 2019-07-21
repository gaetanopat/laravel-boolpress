@extends('layouts.app')

@section('content')
  <section class="show-all-posts">
    <div class="container pt-4 pb-4">
      <h1>Lista dei Posts</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="text-center">Titolo</th>
            <th scope="col" class="text-center">Autore</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Creato il</th>
            <th scope="col" class="text-center">Tags</th>
          </tr>
        </thead>
        @forelse ($all_posts as $post)
        <tbody>
          <tr>
            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td>
            <td class="text-center">{{ $post->author }}</td>
            <td class="text-center">
              @if(!empty($post->category))
                <a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a>
              @else
                Non disponibile
              @endif
            </td>
            <td class="text-center">{{ $post->created_at->toDateString() }}</td>
            <td class="text-center">
              @if(($post->tags)->isNotEmpty())
                @foreach ($post->tags as $tag)
                  <a href=" {{ route('tags.show', $tag->slug )}}">{{ $tag->name }}@if(!$loop->last), @endif</a>
                @endforeach
              @else
                -
              @endif
            </td>
          </tr>
        </tbody>
        @empty
          <tr colspan="4">
            <td>Non ci sono posts</td>
          </tr>
        @endforelse
      </table>
    </div>
  </section>
@endsection
