@extends('theme.base')

@section('content')
    <div class="container text-center py-5">

        @if (isset($cliente))
            <h1>Editar Cliente</h1>
        @else
            <h1>Crear Cliente</h1>
        @endif

        @if (isset($cliente))
            <form action="{{ route('clientes.update', $cliente) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('clientes.store') }}" method="post">
        @endif

        {{-- token de seguridad para el framework --}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value={{ old('name') ?? @$cliente->name }}>
            <p class="form-text">Escriba el nombre del cliente</p>
            @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="due" class="form-label">Due</label>
            <input type="number" name="due" class="form-control" step='0.01'
                value={{ old('due') ?? @$cliente->due }}>
            <p class="form-text">Escriba el valor de la deuda</p>
            @error('due')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments" cols="30" rows="3" class="form-control">{{ old('comments') ?? @$cliente->comments }}</textarea>
            <p class="form-text">Escriba un comentario</p>
            @error('comments')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($cliente))
            <button type="submit" class="btn btn-info">Editar cliente</button>
        @else
            <button type="submit" class="btn btn-info">Guardar cliente</button>
        @endif

        </form>

    </div>
@endsection
