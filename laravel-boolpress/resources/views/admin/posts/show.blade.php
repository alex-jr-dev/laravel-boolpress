@extends('layouts.app')
@section('content')
{{-- @dump($post) --}}
<div class="container">
    <div class="text-center border border-primary rounded-left">
        <h2>TITLE: {{ $post->title }}</h2>
        <p>Contenuto: {{ $post->content }}</p>
        <p>Slug:{{ $post->slug }}</p>
        <p>Id:{{ $post->id }}</p>
        <p>Category: {{ $post->category ? $post->category->name : '-' }}</p>
        <p>Utente: {{ $post->user->name }} ({{ $post->user->email }})</p>
    </div>
    <a href="{{ route('admin.posts.edit', $post->id) }}" class="badge badge-primary">modifica il tuo post</a><br>
    <a href="{{ route('admin.posts.index') }}" class="badge badge-primary">ritorna alla home</a><br>

    <form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger btn-sm" value="Cancella">

    </form>
</div>
@endsection
