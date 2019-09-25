@extends('layouts.app')

@section('content')
<a href="{{ route('notes.create') }}">Nueva nota</a>
<table>
    <thead>
        <tr>
            <td>Nota</td>
            <td>Descripción</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($notes as $note)
        <tr>
            <td>{{ $note->name }}</td>
            <td>{{ $note->description }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="2">No hay notas</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection