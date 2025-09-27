@extends('layouts.technologies')

@section('content')
    <section>
        <h1 class="mb-4 text-center">Tutte le tecnologie</h1>

        <div class="text-center mb-4">
            <a class="btn btn-primary" href="{{ route('technologies.create') }}">Aggiungi tecnologia</a>
        </div>

        <div class="container">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Colore</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>{{ $technology->name }}</td>
                            <td><span class="badge rounded-pill text-white px-3 py-2"
                                    style="background-color: {{ $technology->color }};">{{ $technology->color }}</span>
                            <td>
                                <a href="{{ route('technologies.show', $technology) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#ConfirmModal{{ $technology->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="ConfirmModal{{ $technology->id }}" tabindex="-1"
                            aria-labelledby="ConfirmModalLabel{{ $technology->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ConfirmModalLabel{{ $technology->id }}">Conferma
                                            eliminazione</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare questa tecnologia? Questa azione non può essere
                                        annullata, i progetti con questa tecnologia non avranno più una tecnologia
                                        associata.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
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
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
@endsection
