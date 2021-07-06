@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutti i tag</h1>
                {{-- <a href="{{ route('admin.posts.create') }}" class="btn btn-primary"> --}}
                {{-- Crea nuovo post --}}
                {{-- </a> --}}
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Count Post</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        {{-- <td>
                                    <a href="{{  route('admin.posts.filter', ["tag"->tag->id] )}}">
                        {{ count($tag->posts) }}
                        </a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
