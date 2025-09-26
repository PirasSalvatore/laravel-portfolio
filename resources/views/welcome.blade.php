@extends('layouts.app')


@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <p>jumbotron</p>
</div>

<div class="content">
    <div class="container">
        <p>Questo è il portfolio di Salvatore.</p>

        <a href="{{ route('projects.index') }}">Visualizza i progetti</a>
    </div>
</div>
@endsection