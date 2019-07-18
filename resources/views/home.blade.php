@extends('layouts.app')

@section('content')
  <section class="show-all-posts">
    <div class="container pt-4 pb-4">
      <h1>Lista dei Posts</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col">Creato il</th>
          </tr>
        </thead>
        @forelse ($all_posts as $post)
        <tbody>
          <tr>
            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td>
            <td>{{ $post->author }}</td>
            <td>
              @if(!empty($post->category))
                <a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a>
              @else
                Non disponibile
              @endif
            </td>
            <td>{{ $post->created_at->toDateString() }}</td>
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
