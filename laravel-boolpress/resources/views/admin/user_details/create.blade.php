@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Creazione nuovo utente</h1>
                <a href="{{ route('admin.user_details.index') }}" class="btn btn-primary">
                    Tutti gli utenti
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

            <form action="{{ route('admin.user_details.store') }}" method="post">
                @csrf

                <div class="form-group">

                    <label>Nome</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('nome') }}" required>

                    @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label>Città</label>

                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('city') }}" required>
                    @error('citta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label>Indirizzo</label>

                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci l'indirizzo" value="{{ old('indirizzo') }}" required>
                    @error('indirizzo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label>Luogo di Nascita</label>

                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('birth_place') }}" required>
                    @error('birth_place')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label>Data di Nascita</label>

                    <input type="date" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci la data" value="{{ old('birth_date') }}" required>
                    @error('birth_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Crea utente
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
