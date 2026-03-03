@extends('plantillas.plantilla_web')
@section('titulo')
    {{ $titulo }}
@endsection
@section('encabezado')
    {{ $encabezado }}
@endsection
@section('contenido')
    <div class="container mt-3">
        <a href="crear.php" class='btn btn-success mt-2 mb-2'>Crear</a>
        <a href="listadoClientes.php" class="btn btn-primary">Alta cliente</a>
        <table class="table table-striped table-dark">
            <thead>
                <tr class="text-center">
                    <th scope="col">Detalle</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{!! $tabla !!}}
            </tbody>
        </table>
    </div>
@endsection