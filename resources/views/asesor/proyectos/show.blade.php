@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-12"> 

        <div class="card ">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Información del proyecto</h4>
                <a href="{{route('asesor.asesorados')}}" class="btn btn-danger btn-simple"><i class="tim-icons icon-simple-remove"></i></a>
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

                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Ejecutores del proyecto</h4>                
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
                                    </tr>
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