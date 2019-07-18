@extends('layouts.app')

@section('page_title', 'Visualizzazione post')

@section('content')
  <section class="show-single-post">
    <div class="container pt-4 pb-4">
      <div class="card" style="width: 40rem;">
        <div class="card-body">
          <h5 class="card-title"><strong>Post:</strong> {{ $post->title }}</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Contenuto:</strong> {{ $post->content }}</li>
          <li class="list-group-item"><strong>Autore:</strong> {{ $post->author }}</li>
          <li class="list-group-item"><strong>Slug:</strong> {{ $post->slug }}</li>
          @if(!empty($post->category))
            <li class="list-group-item"><strong>Categoria:</strong> <a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></li>
          @endif
          <li class="list-group-item"><strong>Creato il:</strong> {{ $post->created_at }}</li>
          <li class="list-group-item"><strong>Aggiornato il:</strong> {{ $post->updated_at }}</li>
        </ul>
      </div>
    </div>
  </section>
@endsection
