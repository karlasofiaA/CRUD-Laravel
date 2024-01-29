@extends('theme.base')

@section('content')
    <div class="container text-center py-5">
        <h1>Listado de Cliente</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->due }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Actualizar</a>
                            
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="post" class="d-inline">
                            @method('DELETE')    
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro de elimiar este registro de cliente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($clientes->count())
            {{ $clientes->links() }}
        @endif
    </div>
@endsection
