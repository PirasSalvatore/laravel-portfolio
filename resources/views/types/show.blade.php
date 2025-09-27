@extends('layouts.types')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">{{ $type->name }}</h1>

        <p><strong>Descrizione:</strong> {{ $type->description }}</p>

        <div class="mt-4">
            <a href="{{ route('types.edit', $type) }}" class="btn btn-warning">Modifica</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#ConfirmModal{{ $type->id }}">
                Elimina
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ConfirmModal{{ $type->id }}" tabindex="-1"
        aria-labelledby="ConfirmModalLabel{{ $type->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmModalLabel{{ $type->id }}">Conferma
                        eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo tipo? Questa azione non può essere
                    annullata. tutti i progetti associati a questo tipo verranno impostati sul tipo di
                    default
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('types.destroy', $type) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
