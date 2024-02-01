@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>lista dei tipi di linguaggio</h2>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.types.create')}}">Aggiungi una nuova tipologia</a>
        </div> 
        <div class="row">
            <div class="col-6">
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Typology</th>
                            <th scope="col">Azioni</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th scope="row">{{$type->id}}</th>
                                <td>{{$type->name}}</td>
                                <td>{{ $type->slug}}</td>
                                <td>{{ $type->typology}}</td>
                                <td>
                                    <a class="btn btn-warning" href="">MODIFICA</a>
                                    <form action="" class="d-inline-block">
                                        @csrf
                                        <button class="deleteButtonForm btn btn-danger" type="submit" data-title="{{ $type->name }}">CANCELLA</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
