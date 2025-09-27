@extends('layouts.app')


@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <p>jumbotron</p>
    </div>

    <div class="content">
        <div class="container">
            <p>Questo è il portfolio di Salvatore.</p>

            <a class="btn btn-primary" href="{{ route('projects.index') }}">Visualizza i progetti</a>
            <a class="btn btn-secondary" href="{{ route('types.index') }}">Visualizza i tipi di progetto</a>
            <a class="btn btn-info" href="{{ route('technologies.index') }}">Visualizza le tecnologie</a>
        </div>
    </div>
@endsection
