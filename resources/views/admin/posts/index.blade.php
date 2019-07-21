@extends('layouts.app')

@section('page_title', 'Visualizzazione posts')

@section('content')
  <section class="show-all-posts">
    <div class="container pt-4 pb-4">
      <h3 class="float-left">Visualizzazione posts</h3>
      <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Crea nuovo post</a>
      <table>
        <tr>
          <th class="text-center">ID post</th>
          <th class="text-center">Titolo</th>
          <th class="text-center">Autore</th>
          <th class="text-center">Slug</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">Tags</th>
          <th class="text-center">Creato il</th>
          <th class="text-center">Aggiornato il</th>
          <th class="text-center">Actions</th>
        </tr>
        @forelse ($posts as $post)
        <tr>
          <td class="text-center"><strong>{{ $post->id }}</strong></td>
          <td class="text-center">{{ $post->title }}</td>
          <td class="text-center">{{ $post->author }}</td>
          <td class="text-center">{{ $post->slug }}</td>
          <td class="text-center">
            @if(!empty($post->category))
              <a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a>
            @else
              Non disponibile
            @endif
          </td>
          <td class="text-center">
            @if(($post->tags)->isNotEmpty())
              @foreach ($post->tags as $tag)
                <a href=" {{ route('tags.show', $tag->slug )}}">{{ $tag->name }}@if(!$loop->last), @endif</a>
              @endforeach
            @else
              Non disponibile
            @endif
          </td>
          <td class="text-center">{{ $post->created_at }}</td>
          <td class="text-center">{{ $post->updated_at }}</td>
          <td class="text-center"><a href="{{ route('admin.posts.show', $post->id) }}">Visualizza</a> - <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a> -
            <form class="form_delete" action="{{ route('admin.posts.destroy', $post->id )}}" method="post">
              <input type="submit" name="" value="Cancella">
              @method('DELETE')
              @csrf
            </form>
          </td>
        </tr>
    @empty
      <tr>
        <td colspan="6" class="no_posts"><h1>Non ci sono posts</h1></td>
      </tr>
    @endforelse
      </table>

    </div>
  </section>
@endsection
