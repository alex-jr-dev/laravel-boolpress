@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutti gli utenti</h1>
            </div>
            <table class="table">
                <div class="form-group">
                    {{-- <a href="{{route("admin.user_details.create")}}" class="btn btn-success"> --}}
                    <a href="#" class="btn btn-success">
                        Crea utente
                        </button>
                    </a>
                </div>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Citta</th>
                        <th>Indirizzo</th>
                        <th>Data di nascita</th>
                        <th>Luogo di nascita</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
