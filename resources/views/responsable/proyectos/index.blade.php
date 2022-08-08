@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-12"> 

        @include('layouts.alerts')

        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h4 class="card-title"> Proyectos</h4>
                    </div>

                    <div class="col-sm-6">
                        <div class="btn-group  float-right" >
                            <a href="{{route('responsable.proyectos.create')}}" class="btn btn-sm btn-primary btn-simple active" > <i class="fa fa-plus"></i> Nuevo</a>
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
                                <th>Proyecto</th>
                                <th>Modalidad</th>
                                <th>Descripción</th>
                                <th>Presupuesto</th>
                                <th>Grupo</th>
                                <th>Inicio</th>
                                <th>Finalización</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($proyectos) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td>{{$proyecto->id}}</td>
                                        <td>{{$proyecto->nombre_proyecto}}</td>
                                        <td>{{$proyecto->modalidad}}</td>
                                        <td>{{$proyecto->descripcion}}</td>
                                        <td>{{$proyecto->presupuesto}}</td>
                                        <td>{{$proyecto->nombre_grupo}}</td>
                                        <td>{{$proyecto->fecha_inicio}}</td>
                                        <td>{{$proyecto->fecha_fin}}</td>
                                        <td>{{$proyecto->estado}}</td>
                                        <td>
                                            <a href="{{route('responsable.proyectos.show', $proyecto->id)}}" class="btn btn-sm btn-info btn-simple " ><i class="tim-icons icon-notes"></i> Ver</a>

                                            <a href="{{route('responsable.proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-warning btn-simple " ><i class="tim-icons icon-pencil"></i> </a>
                                            
                                            <button type="button" class="btn btn-sm btn-danger btn-simple" data-toggle="modal" data-target="#modal-delete-{{$proyecto->id}}">
                                                <i class="tim-icons icon-trash-simple"></i> 
                                            </button>
                                            
                                        </td>                            
                                    </tr>                        
                                    @include('responsable.proyectos.modal-delete')
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="card-footer">
                {{ $proyectos->links() }}
            </div>
        </div>
    </div>
</div>

    


@endsection