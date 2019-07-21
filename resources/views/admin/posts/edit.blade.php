@extends('layouts.app')

@section('page_title', 'Modifica post')

@section('content')
  <section class="show-single-post">
    <div class="container pb-4 pt-4">
      <h4>Modifica post</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('admin.posts.update', $post->id) }}" method="post" id="#edit_post_form">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Titolo post: </label>
          <input type="text" class="form-control" placeholder="Inserisci il titolo del post" name="title" value="{{ old('title', $post->title) }}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="content">Contenuto: </label>
          <textarea class="form-control" placeholder="Inserisci contenuto" name="content">{{ old('content', $post->content) }}</textarea>
          @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="author">Autore: </label>
          <input type="text" class="form-control" placeholder="Inserisci autore" name="author" value="{{ old('author', $post->author) }}">
          @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Categoria: </label>
          <select class="form-control" name="category_id">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tag: </label>
          @foreach ($tags as $tag)
            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}</label>
          @endforeach
        </div>
        <div class="form-group text-center">
          <input type="submit" value="Aggiorna" class="btn btn-primary mr-2">
          <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna alla Gestione dei Posts</a>
        </div>
      </form>
    </div>
  </section>
@endsection
