@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Notas</h1>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" href="{{ route('notes.create') }}">Nueva nota</a>
                <table class="mt-3 table table-sm table-striped">
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
                            <td class="text-center align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-warning" href="{{route('notes.edit', $note)}}">Editar</a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void();" class="del-note" data-id="{{$note->id}}">Eliminar</a>
                                </div>
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
            </div>
        </div>
    </div>
</div>
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