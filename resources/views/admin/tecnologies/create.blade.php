@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Inserisci una nuova Tecnologia</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{route('admin.tecnologies.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name"> Name</label>
                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
