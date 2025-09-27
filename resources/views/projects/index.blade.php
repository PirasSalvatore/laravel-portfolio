@extends('layouts.projects')

@section('content')
    <section>
        <h1 class="text-center text-2xl font-bold mb-4 mt-4">Progetti</h1>

        <div class="text-center mb-4">
            <a class="btn btn-primary" href="{{ route('projects.create') }}">Aggiungi nuovo progetto</a>
        </div>

        <div class="container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Technologies</th>
                        <th>Completato?</th>
                        <th>
                            azioni
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    @forelse ($project->technologies as $technology)
                                        <span class="badge me-2"
                                            style="background-color: {{ $technology->color }}; color: white;">
                                            {{ $technology->name }}
                                        </span>
                                    @empty
                                        <span>No technologies assigned</span>
                                    @endforelse
                                </div>
                            </td>
                            <td>{{ strtotime($project->end_date) < strtotime(date('Y-m-d')) ? 'Sì' : 'No' }}</td>
                            <td>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-success">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#ConfirmModal{{ $project->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="ConfirmModal{{ $project->id }}" tabindex="-1"
                            aria-labelledby="ConfirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ConfirmModalLabel">Conferma Eliminazione</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare il progetto "{{ $project->title }}"? Questa azione non
                                        può essere
                                        annullata.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
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
