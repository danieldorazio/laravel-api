@extends('layouts.admin')

@section('content')

    <div class="container">

        <h2 class="mt-4">{{ $project->title }}</h2>

        <div class="mt-4">
            Linguaggio principale: {{ $project->type ? $project->type->name : 'NON DEF' }}
        </div>

        <div class="mt-4">
            Data: {{ $project->created_at }}
        </div>

        <div>
            Tecnologie:
            @if (count($project->tecnologies) > 0)
                @foreach ($project->tecnologies as $tecnology)
                    <span>{{ $tecnology->name }}</span>
                @endforeach
            @else
                <span>NON DEF</span>
            @endif


        </div>

        <p class="mt-4">
            {{ $project->description }}
        </p>
    </div>

@endsection
