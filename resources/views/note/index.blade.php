@extends('layouts.app')

@section('content')
<a href="{{ route('notes.create') }}">Nueva nota</a>
<table>
    <thead>
        <tr>
            <td>Titulo</td>
            <td>Descripción</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @forelse ($notes as $note)
        <tr>
            <td>{{ $note->name }}</td>
            <td>{!! nl2br(e($note->description)) !!}</td>
            <td>
                <a href="{{route('notes.edit', $note)}}">Editar</a> |
                <a href="javascript:void();" class="del-note" data-id="{{$note->id}}">Eliminar</a>
                <form method="POST" action="{{route('notes.delete', $note)}}" id="frmDelNote{{$note->id}}">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">No hay notas</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

@section('pageScripts')
    <script>
        var btnsDeleteNotes = document.querySelectorAll('.del-note')
        btnsDeleteNotes.forEach(element => {
            element.addEventListener('click', function(evt) {
                evt.preventDefault()
                evt.stopPropagation()
                var id = this.dataset.id
                var sure = confirm('¿Está seguro de eliminar la nota?')
                if (!sure) return false
                document.querySelector(`#frmDelNote${id}`).submit()
            })
        })
    </script>
@endsection