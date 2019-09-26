@extends('layouts.app')

@section('content')
    <h2>Editar nota</h2>
    <form method="POST" action="{{route('notes.update', $note)}}">
        @method('PUT')
        @include('note.form', ['btnText' => 'Actualizar'])
    </form>
@endsection