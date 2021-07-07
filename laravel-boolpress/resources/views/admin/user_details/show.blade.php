@extends('layouts.app')
@section('content')
{{-- @dump($post) --}}
<div class="container">
    <div class="text-center border border-primary rounded-left">
        <h2>Nome: {{ $user->name }}</h2>
        <p>Indirizzo: {{ $user->address }}</p>
        <p>Data di nascita:{{ $user->birth_date }}</p>
        <p>Citta:{{ $user->city }}</p>
        <p>Luogo di nascita: {{ $user->birth_place}}</p>
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
