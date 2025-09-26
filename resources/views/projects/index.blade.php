@extends('layouts.projects')

@section('content')

<section>
    <h1 class="text-center text-2xl font-bold mb-4 mt-4">Progetti</h1>

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
                    <td>{{ $project->technologies_used }}</td>
                    <td>{{ strtotime($project->end_date) < strtotime(date('Y-m-d')) ? 'Sì' : 'No' }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}">Visualizza</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection