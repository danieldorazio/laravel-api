@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <h2>Lista delle Tecnologies</h2>
        <div class="text-end">
            <a class="btn btn-success" href=" {{route('admin.tecnologies.create')}}">Aggiungi una nuova tecnologia</a>
        </div>

        @if (count($tecnologies) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tecnologies as $tecnology )
                        <tr>
                            <td scope="row">{{$tecnology->id}}</td>
                            <td>{{$tecnology->name}}</td>
                            <td>{{$tecnology->slug}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.tecnologies.edit', ['tecnology' => $tecnology->slug])}}">MODIFICA</a>

                                <form class="d-inline-block " action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="deleteButtonForm btn btn-danger ">CANCELLA</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Non ci sono ancora Tecnologie</div>
        @endif

        <div class="modal" tabindex="-1" id="deleteMessage">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancella Tecnologia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Vuoi veramente cancellare la tecnologia: <span id="title-to-delete"></span></p>
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
