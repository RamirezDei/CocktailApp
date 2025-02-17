@extends('layouts.app')
@section('title', 'Editar Cóctel' )
@section('content')
<div class="container" style="max-width: 600px">
        <h2 class="text-center mb-4">Editar Cóctel</h2>

        <form action="{{ url('/cocktails/update/'.$cocktail->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Cóctel</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $cocktail->name }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Cóctel</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $cocktail->image }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ url('/saved') }}" class="btn btn-secondary">Cancelar</a>
        </form>
</div>
@endsection
