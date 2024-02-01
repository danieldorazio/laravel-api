@extends('layouts.admin')

@section('content')

    <div class="continer mt-5">
        <h2 class="text-center">Modifica il Progetto: {{ $project->title }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title') ?? $project->title }}">
            </div>

            <div class="mb-3">
                <label for="decription" class="form-label">Descrizione Progetto</label>
                <textarea class="form-control" id="decription" rows="5" name="description">{{ old('description') ?? $project->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="type">Linguaggio Principale</label>
                <select class="form-select" name="type_id"  id="type">
                    <option @selected(!old('type_id', $project->type_id)) value="">Nessuna Categoria</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id ) == $type->id) value="{{ $type->id }}">{{ $type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                @foreach ($tecnologies as $tecnology)
                    <div class="form-check">
                        <input @checked( $errors->any() ? in_array($tecnology->id, old('tecnologies', [])) : $project->tecnologies->contains($tecnology)) type="checkbox" id="tecnoligy-{{$tecnology->id}}" value="{{$tecnology->id}}" name="tecnologies[]">
                        <label for="tecnology-{{$tecnology->id}}"> {{$tecnology->name }}</label>
                    </div>
                @endforeach
            </div>

            <button class="btn btn-success" type="submit">Salva</button>

        </form>
    </div>

@endsection
