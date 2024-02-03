@extends('layouts.admin')

@section('content')
    <div class="continer mt-5">
        <h2 class="text-center">Inserisci un nuovo Progetto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="decription" class="form-label">Descrizione Progetto</label>
                <textarea class="form-control" id="decription" rows="3" name="description">{{ old('description') }}</textarea>
            </div>

            <div class ='mb-3'>
                <label for="type">Linguaggio Principale</label>
                <select class="form-select" aria-label="Default select example" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">Nessuna categoria</option>
                    @foreach ($types as $type)
                       <option @selected(old('type_id') == $type->id ) value="{{ $type->id}}">{{$type->name}} </option> 
                    @endforeach 
                </select>
            </div>

            <div class="mb-3">
                @foreach ($tecnologies as $tecnology )
                    <div class="form-check">
                        <input @checked(in_array($tecnology->id, old('tecnologies', []))) type="checkbox" id="tecnology-{{$tecnology->id}}" value="{{$tecnology->id}}" name="tecnologies[]">
                        <label for="tecnology-{{$tecnology->id}}">{{$tecnology->name}}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>

        </form>
    </div>
@endsection
