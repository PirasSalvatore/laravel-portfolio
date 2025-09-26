@extends('layouts.projects')

@section('content')
    <div class="container my-5">
        
        <section>
            <h1 class="text-center text-2xl font-bold">{{ $project->title }}</h1>
            

            <div class="container">
                <div class="d-flex flex-wrap mt-4 p-4 rounded-4 shadow-lg">
                    <div class="col-4 mt-4">
                        <strong>Technologies:</strong> {{ $project->technologies_used }}
                    </div>
                    <div class="col-4 mt-4">
                        <strong>Data di inizio:</strong> {{ date('d-m-Y', strtotime($project->start_date)) }}
                    </div>

                    <div class="col-4 mt-4">
                        <strong>Data di fine:</strong> {{ date('d-m-Y', strtotime($project->end_date)) }}
                    </div>

                    <div class="col-12 mt-4">
                        <p class="">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection