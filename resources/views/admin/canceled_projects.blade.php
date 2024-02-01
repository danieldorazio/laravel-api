@extends('layouts.admin')



@section('content')
    <div class="container mt-5">
        <h2>lista dei projects cancellati</h2>

        <div class="text-end">
            <form action="{{ route('admin.defDeliteAll')}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button class="deleteButtonForm btn btn-danger" type="submit" data-title="">CANCELLA TUTTO</button>
            </form>
        </div>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Linguaggio Principale</th>
                    <th scope="col">Data di Creazione</th>
                    <th scope="col">Data di Cancellazione</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->type ? $project->type->name : 'NON DEF' }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td> {{ $project->deleted_at }}</td>
                        <td>
                            <form action="{{ route('admin.restore', ['id' => $project->id]) }}" class="d-inline-block"
                                method="GET">
                                @csrf
                                <button class="btn btn-success" type="submit">RIPRISTINA</button>
                            </form>

                            <form action="{{ route('admin.defDelite', ['id' => $project->id]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="deleteButtonForm btn btn-danger" type="submit"
                                    data-title="">CANCELLA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>




        <div class="modal" tabindex="-1" id="deleteMessage">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancella Progetto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Vuoi veramente cancellare il progetto: <span id="title-to-delete"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="action-delete" class="btn btn-danger">Sì, voglio cancellare</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
