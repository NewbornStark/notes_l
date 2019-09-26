@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Editar nota</h2>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" href="{{route('notes')}}">Volver</a>
                <div class="col-md-3 p-0">
                    <form class="mt-3" method="POST" action="{{route('notes.update', $note)}}">
                        @method('PUT')
                        @include('note.form', ['btnText' => 'Actualizar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection