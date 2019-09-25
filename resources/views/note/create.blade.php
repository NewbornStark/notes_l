@extends('layouts.app')

@section('content')
    <h2>Regirtrar nota</h2>
    <form method="POST" action="{{route('notes.store')}}">
        @include('note.form', ['btnText' => 'Guardar'])
    </form>
@endsection