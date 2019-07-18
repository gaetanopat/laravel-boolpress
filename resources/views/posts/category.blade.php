@extends('layouts.app')

@section('content')
  <section class="show-all-posts">
    <div class="container pt-4 pb-4">
      <h1>Lista dei posts appartenenti alla categoria {{ $category->name }}</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Creato il</th>
          </tr>
        </thead>
        @forelse ($posts as $post)
        <tbody>
          <tr>
            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->created_at->toDateString() }}</td>
          </tr>
        </tbody>
        @empty
          <tr colspan="3">
            <td>Non ci sono posts per questa categoria</td>
          </tr>
        @endforelse
      </table>
    </div>
  </section>
@endsection
