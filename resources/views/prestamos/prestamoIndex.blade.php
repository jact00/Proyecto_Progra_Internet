@extends('layouts.suabe')

@section('titulo')
Prestamos
@endsection

@section('contenido')

<div class="row">
    <div class="col col-12 col-lg-10 mx-auto">
        <div class="page-header text-center mb-3">
            <br>
            <h3> 
                @can('forceDelete', App\Models\Movimiento::class)
                Préstamos
                @else
                Préstamos abiertos
                @endcan
            </h3>
            <div class="text-right mb-2">
                <a href="{{ route('prestamo.create') }}" class="btn btn-success"> Agregar </a>
            </div>
        </div>

        <div class="card border-primary">
            <div class="card-body table-responsive">
                <table class="table table-sm text-center table-hover mb-0">
                    <thead>
                        <tr class="table-primary align-middle">
                            <th scope="col" class=" align-middle">ID</th>
                            <th scope="col" class=" align-middle">Alumno</th>
                            <th scope="col" class=" align-middle">Fecha</th>
                            <th scope="col" class=" align-middle">
                                @can('forceDelete', App\Models\Movimiento::class)
                                Libros
                                @else
                                Libros no devueltos
                                @endcan
                            </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamos as $prestamo)
                        @if($prestamo->ejemplares_en_prestamo()->count() > 0 || \Auth::user()->operador->es_admin)
                        <tr class="table-secondary">
                            <th scope="row" class="align-middle">
                                <a href="{{ route('prestamo.show',[$prestamo]) }}" class="btn btn-link">
                                        {{ $prestamo->id }}
                                </a>
                            </th>
                            <td class="text-left align-middle">{{ $prestamo->alumno->user->nombre_completo }}</td>
                            <td class="align-middle">{{ $prestamo->created_at->format('d/m/Y') }}</td>
                            <td class="align-middle">
                                @can('forceDelete', App\Models\Movimiento::class)
                                {{ $prestamo->ejemplares()->count() }}
                                @else
                                {{ $prestamo->ejemplares_en_prestamo()->count() }}
                                @endcan
                            </td>
                            <td class="align-middle">
                                @can('delete', $prestamo)
                                <form action="{{ route('prestamo.destroy', [$prestamo]) }}" method="POST" name="borrar">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                @else
                                Solo puede ser eliminado por 
                                <div class="d-inline text-info"> {{ $prestamo->operador->user->nickname }} </div>
                                @endcan
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection 