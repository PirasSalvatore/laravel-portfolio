@extends('layouts.projects')

@section('content')
    <div class="container my-5">
        {{-- @dd($project->technologies) --}}
        <section>
            <h1 class="text-center text-2xl font-bold">{{ $project->title }}</h1>

            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Modifica</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ConfirmModal">
                Elimina
            </button>


            <div class="container">
                <div class="d-flex flex-wrap mt-4 p-4 rounded-4 shadow-lg">
                    <div class="col-3 mt-4">
                        <strong>Technologies:</strong>
                        @forelse ($project->technologies as $technology)
                            <span class="badge me-2" style="background-color: {{ $technology->color }}; color: white;">
                                {{ $technology->name }}
                            </span>
                        @empty
                            <span>No technologies assigned</span>
                        @endforelse
                    </div>

                    <div class="col-3 mt-4">
                        <strong>Type:</strong> {{ $project->type->name }}
                    </div>

                    <div class="col-3 mt-4">
                        <strong>Data di inizio:</strong> {{ date('d-m-Y', strtotime($project->start_date)) }}
                    </div>

                    <div class="col-3 mt-4">
                        <strong>Data di fine:</strong> {{ date('d-m-Y', strtotime($project->end_date)) }}
                    </div>

                    <div class="col-12 mt-4">
                        <p class="">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade" id="ConfirmModal" tabindex="-1" aria-labelledby="ConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ConfirmModalLabel">Conferma Eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il progetto "{{ $project->title }}"? Questa azione non può essere
                    annullata.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
