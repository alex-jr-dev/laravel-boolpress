@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutte le categorie</h1>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    Crea nuovo post
                </a>
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
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ Count($category->posts) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
