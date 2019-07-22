@extends('layouts.app')

@section('page_title', 'Creazione post')

@section('content')
  <section class="show-single-post">
    <div class="container pt-4 pb-4">
      <h4>Creazione nuovo post</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('admin.posts.store') }}" method="post" id="create_post_form">
        @csrf
        <div class="form-group">
          <label for="title">Titolo post: </label>
          <input type="text" class="form-control" placeholder="Inserisci il titolo del post" name="title" value="{{ old('title') }}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="content">Contenuto: </label>
          <textarea class="form-control" placeholder="Inserisci contenuto" name="content">{{ old('content') }}</textarea>
          @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="author">Autore: </label>
          <input type="text" class="form-control" placeholder="Inserisci autore" name="author" value="{{ old('author') }}">
          @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Categoria: </label>
          <select class="form-control" name="category_id">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tag: </label>
          @foreach ($tags as $tag)
            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', array())) ? 'checked' : ''}}> {{ $tag->name }} </label>
          @endforeach
        </div>
        <div class="form-group text-center">
          <input type="submit" value="Crea" class="btn btn-primary mr-2">
          <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna alla Home</a>
        </div>
      </form>
    </div>
  </section>
@endsection
