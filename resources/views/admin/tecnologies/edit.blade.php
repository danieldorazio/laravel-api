@extends('layouts.admin')

@section('content')

@foreach ($tecnologies as $tecnology)

<div>{{$tecnology->name}}</div>
    
@endforeach
    
@endsection