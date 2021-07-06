@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h1>{{ $post->title }}</h1>
                    {{-- {{ $post->updated_at }} | {{ $post->slug }} | {{ $post->category ? $post->category->name : '-' }} --}}
                    {{-- {{ $post->slug }} | {{ $post->category ? $post->category->name : '-' }} --}}
                    {{ $post->updated_at }} | {{ $post->slug }}
                </div>

                <a href="{{ route('posts.index') }}" class="btn btn-primary">
                    Tutti i posts
                </a>
            </div>

            <p class="lead">{{ $post->content }}</p>

            <p>Scritto da {{ $post->user->name }}</p>
        </div>
    </div>
</div>
@endsection
