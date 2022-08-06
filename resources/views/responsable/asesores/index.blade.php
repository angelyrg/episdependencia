@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                        <div class="col-sm-6 text-left">
                            <h4 class="card-title"> Asesores</h4>
                        </div>

                        <div class="col-sm-6">
                            <div class="btn-group  float-right" >
                                <a href="{{route('responsable.asesores.create')}}" class="btn btn-sm btn-primary btn-simple active" > <i class="fa fa-plus"></i> Nuevo</a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($asesores) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($asesores as $asesor)
                                    <tr>
                                        <td>{{$asesor->id}}</td>
                                        <td>{{$asesor->nombres}}</td>
                                        <td>{{$asesor->apellidos}}</td>
                                        <td>{{$asesor->dni}}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning btn-simple " ><i class="tim-icons icon-pencil"></i> Editar</a>

                                            <button type="button" class="btn btn-sm btn-danger btn-simple" data-toggle="modal" data-target="#modal-delete-{{$asesor->id}}">
                                                <i class="tim-icons icon-trash-simple"></i> Eliminar
                                            </button>
                                            
                                        </td>                            
                                    </tr>                        
                                    @include('responsable.asesores.modal-delete')
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

    


@endsection