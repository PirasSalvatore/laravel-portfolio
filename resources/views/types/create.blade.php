@extends('layouts.types')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Aggiungi un nuovo tipo di progetto</h1>

        <form action="{{ route('types.store') }}" method="POST">
            @csrf

            <div class="form-control mb-3 d-flex flex-column">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="description" class="form-label">Descrizione del tipo</label>
                <textarea name="description" id="description" rows="3" class="form-input"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Crea Tipo</button>
        </form>
    </div>
@endsection
