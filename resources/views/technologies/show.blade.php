@extends('layouts.technologies')

@section('content')
    <section>
        <h1 class="text-center mt-4">{{ $technology->name }}</h1>

        <div class="mt-4 text-center">
            <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-warning">Modifica</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#ConfirmModal{{ $technology->id }}">
                Elimina
            </button>
        </div>

        <div class="container">
            <div class="mb-3">
                <strong>Colore:</strong>
                <span class="badge rounded-pill text-white px-3 py-2"
                    style="background-color: {{ $technology->color }};">{{ $technology->color }}
                </span>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ConfirmModal{{ $technology->id }}" tabindex="-1"
            aria-labelledby="ConfirmModalLabel{{ $technology->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ConfirmModalLabel{{ $technology->id }}">Conferma
                            eliminazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare questa tecnologia? Questa azione non può essere
                        annullata, i progetti con questa tecnologia non avranno più una tecnologia associata.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('technologies.destroy', $technology) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
