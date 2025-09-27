@extends('layouts.types')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Modifica il tipo di progetto</h1>

        <form action="{{ route('types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-control mb-3 d-flex flex-column">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="description" class="form-label">Descrizione del tipo</label>
                <textarea name="description" id="description" rows="3" class="form-input">{{ $type->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna Tipo</button>
        </form>
    </div>
@endsection
