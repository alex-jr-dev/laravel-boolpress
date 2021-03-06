@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Modifica post {{ $post->id }}</h1>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                    Tutti i posts
                </a>
            </div>
            <div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>



            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}" required>

                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Contenuto</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Inizia a scrivere qualcosa..." required>
                    {{ old('content', $post->content) }}
                    </textarea>

                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- categoria del post --}}
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror">

                        <option value="">-- seleziona categoria --</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach

                    </select>

                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tags --}}
                <div class="form-group">
                    <label for="">Tags</label>
                    <br>
                    @foreach($tags as $tag)

                    <div class="form-check form-check-inline">
                        <label for="form-check-label">
                            <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id}} " {{$post->tags->contains($tag) ? 'checked' : ''  }}>
                            {{ $tag->name}}
                        </label>
                    </div>
                    @endforeach

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Salva post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
