@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>lista dei projects</h2>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Aggiungi un nuovo progetto</a>
        </div>
        
        @if (count($projects) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Linguaggio Principale</th>
                        <th scope="col">IMMAGINE</th>
                        <th scope="col">Data</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->type ? $project->type->name : 'NON DEF'}}</td>
                            <td>{{ $project->created_at }}</td>
                            <td>{{ $project->cover_image ? 'PRESENTE' : 'NON DEF'}}</td>
                            <td>
                                <a class="btn btn-info"
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">DETTAGLI</a>

                                <a class="btn btn-warning"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">MODIFICA</a>

                                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                    method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="deleteButtonForm btn btn-danger" type="submit"
                                        data-title="{{ $project->title }}">CANCELLA</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warnin">Non ci sono ancora proggetti</div>
        @endif



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
