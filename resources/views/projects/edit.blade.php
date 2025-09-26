@extends('layouts.projects')

@section('content')

    <section>
        <h1>Modifica un progetto</h1>

        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-control mb-3 d-flex flex-column">
                <label for="title" class="form-label">Titolo del progetto</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ $project->title }}" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" name="client" id="client" class="form-input" value="{{ $project->client }}">
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="start_date" class="form-label">Data di inizio</label>
                <input type="date" name="start_date" id="start_date" class="form-input" value="{{ $project->start_date }}" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="end_date" class="form-label">Data di fine</label>
                <input type="date" name="end_date" id="end_date" class="form-input" value="{{ $project->end_date }}" required>
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="technologies_used" class="form-label">Tecnologie utilizzate</label>
                <input type="text" name="technologies_used" id="technologies_used" class="form-input" value="{{ $project->technologies_used }}">
            </div>
            <div class="form-control mb-3 d-flex flex-column">
                <label for="description" class="form-label">Descrizione del progetto</label>
                <textarea name="description" id="description" rows="3" class="form-input" required>{{ $project->description }}</textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Modifica progetto">
        </form>
    </section>

@endsection