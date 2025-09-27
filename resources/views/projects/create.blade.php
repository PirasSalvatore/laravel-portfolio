@extends('layouts.projects')

@section('content')
    <section>
        <h1>Aggiungi un progetto</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="form-control mb-3 d-flex flex-column">
                <label for="title" class="form-label">Titolo del progetto</label>
                <input type="text" name="title" id="title" class="form-input" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" name="client" id="client" class="form-input">
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="start_date" class="form-label">Data di inizio</label>
                <input type="date" name="start_date" id="start_date" class="form-input" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="end_date" class="form-label">Data di fine</label>
                <input type="date" name="end_date" id="end_date" class="form-input" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="technologies_used" class="form-label">Tecnologie utilizzate</label>
                <input type="text" name="technologies_used" id="technologies_used" class="form-input">
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="type_id" class="form-label">Tipologia Progetto</label>
                <select name="type_id" id="type_id" class="form-input">
                    <option value="">Seleziona una tipologia</option>
                    @foreach ($types as $type)
                        @if ($type->id != 1)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="description" class="form-label">Descrizione del progetto</label>
                <textarea name="description" id="description" rows="3" class="form-input" required></textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Aggiungi progetto">
        </form>
    </section>
@endsection
