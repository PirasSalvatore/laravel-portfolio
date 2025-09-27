@extends('layouts.types')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Tipi di progetti</h1>
            <a href="{{ route('types.create') }}" class="btn btn-primary">Aggiungi nuovo tipo</a>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col" class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('types.show', $type) }}" class="btn btn-sm btn-info"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{ route('types.edit', $type) }}" class="btn btn-sm btn-warning"><i
                                    class="bi bi-pencil-fill"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#ConfirmModal{{ $type->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="ConfirmModal{{ $type->id }}" tabindex="-1"
                        aria-labelledby="ConfirmModalLabel{{ $type->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ConfirmModalLabel{{ $type->id }}">Conferma
                                        eliminazione</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare questo tipo? Questa azione non può essere
                                    annullata. tutti i progetti associati a questo tipo verranno impostati sul tipo di
                                    default
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('types.destroy', $type) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
