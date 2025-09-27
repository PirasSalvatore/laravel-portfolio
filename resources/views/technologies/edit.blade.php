@extends('layouts.technologies')

@section('content')
    <section>
        <h1 class="text-center">Nuova tecnologia</h1>

        <div class="container">
            <form action="{{ route('technologies.update', $technology) }}" method="POST">
                @csrf {{-- protezione contro attacchi CSRF --}}
                @method('PUT') {{-- per specificare il metodo HTTP PUT --}}

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $technology->name }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Colore</label>
                    <input type="color" class="form-control" id="color" name="color"
                        value="{{ $technology->color }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Aggiorna tecnologia</button>
                </div>
            </form>
        </div>

    </section>
@endsection
