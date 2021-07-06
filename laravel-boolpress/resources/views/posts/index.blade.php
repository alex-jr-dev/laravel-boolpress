@extends('layouts.public')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">

        @foreach ($posts as $post)

        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ substr($post->content, 0, 80) }}</p>
        <p class="card-text"><small class="text-muted">{{ $post->updated_at }}</small></p>

        <a href="{{ route('posts.show', ['slug' => $post->slug ]) }}">Apri...</a>

        @endforeach

    </div>
</div>
@endsection
