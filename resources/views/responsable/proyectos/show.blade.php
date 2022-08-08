@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-12"> 

        <div class="card ">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Información del proyecto</h4>
                <a href="{{route('responsable.proyectos.index')}}" class="btn btn-danger btn-simple"><i class="tim-icons icon-simple-remove"></i></a>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                       
                        <p class="title"><i class="tim-icons icon-bulb-63 text-info mr-2"></i>Nombre del proyecto</p>
                        <p class="mb-3">{{$proyecto->nombre_proyecto}}</p>
                        
                        <p class="title"><i class="tim-icons icon-bullet-list-67 text-warning mr-2"></i>Modalidad del proyecto</p>
                        <p class="mb-3">{{$proyecto->modalidad}}</p>
                        
                        <p class="title"><i class="tim-icons icon-align-left-2 text-primary mr-2"></i>Descripción</p>
                        <p class="mb-3">{{$proyecto->descripcion}}</p>

                        <p class="title"><i class="tim-icons icon-money-coins text-success mr-2"></i>Presupuesto</p>
                        <p class="mb-3">S/ {{$proyecto->presupuesto}}</p>


                    </div>
                    <div class="col-lg-4 col-md-6 ">

                        <p class="title"><i class="tim-icons icon-bulb-63 text-info mr-2"></i> Nombre del grupo</p>
                        <p class="mb-3">{{$proyecto->nombre_grupo}}</p>
                        
                        <p class="title"><i class="tim-icons icon-calendar-60 text-danger mr-2"></i>Fecha de inicio</p>
                        <p class="mb-3">{{$proyecto->fecha_inicio}}</p>
                        
                        <p class="title"><i class="tim-icons icon-calendar-60 text-primary mr-2"></i> Fecha de finalización</p>
                        <p class="mb-3">{{$proyecto->fecha_fin}}</p>

                        <p class="title"><i class="tim-icons icon-compass-05 text-success mr-2"></i> Estado</p>
                        <p class="mb-3">{{$proyecto->estado}}</p>

                    </div>

                    <div class="col-lg-4 col-md-6">

                        <p class="title"> <i class="tim-icons icon-calendar-60 text-info mr-2"></i>  Fecha de creación</p>
                        <p class="mb-3">{{$proyecto->created_at->format('Y-m-d')}}</p>
                        
                        <p class="title"> <i class="tim-icons icon-bullet-list-67 text-warning mr-2"></i> Asesores</p>
                        @foreach ($proyecto->asesores as $asesor)
                            <p>{{$asesor->nombres." ".$asesor->apellidos}}</p>
                        @endforeach

                        <p class="title"> <i class="tim-icons icon-calendar-60 text-info mr-2"></i>  Usuario</p>
                        <p class="mb-3">{{$usuario->username}}</p>


                    </div>
                </div>
            </div>
        </div>

        @include('layouts.alerts')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Ejecutores del proyecto</h4>

                <button type="button" class="btn btn-sm btn-info btn-simple" data-toggle="modal" data-target="#modal-create-ejecutor">
                    <i class="tim-icons icon-badge"></i> Nuevo
                </button>
                @include('responsable.proyectos.modal-create-ejecutor')
                
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter table-sm " id="">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cargo</th>
                                <th>Ciclo</th>
                                <th>Options</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($proyecto->ejecutores) == 0)
                                <tr>
                                    <td colspan="6">Todavía no hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($proyecto->ejecutores as $ejecutor)
                                    <tr>
                                        <td>{{$ejecutor->id}}</td>
                                        <td>{{$ejecutor->nombres}}</td>
                                        <td>{{$ejecutor->apellidos}}</td>
                                        <td>{{$ejecutor->cargo}}</td>
                                        <td>{{$ejecutor->ciclo}}</td>
                                        <td>                                           
                                            <button type="button" class="btn btn-sm btn-danger btn-simple" data-toggle="modal" data-target="#modal-delete-ejecutor-{{$ejecutor->id}}">
                                                <i class="tim-icons icon-trash-simple"></i> Eliminar
                                            </button>                                            
                                        </td>
                                    </tr>                        
                                    @include('responsable.proyectos.modal-delete-ejecutor')
                                    
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