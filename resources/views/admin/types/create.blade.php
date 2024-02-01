@extends('layouts.admin')

@section('content')
    <div class="continer mt-5">
        <h2 class="text-center">Inserisci una nuova tipologia di linguaggio</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('title') }}">
            </div>
            
            <div class ='mb-3'>
                <label for="typology">tipologia</label>
                <select class="form-select" aria-label="Default select example" name="typology" id="typology">
                    <option  value="">Nessuna categoria</option>
                    @foreach ($types as $type)
                    <option  value="">{{ $type}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="submit">Salva</button>

        </form>
    </div>
@endsection
