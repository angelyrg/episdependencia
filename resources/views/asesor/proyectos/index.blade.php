@extends('layouts.main')

@section('content')
    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h4 class="card-title"> Proyectos asesorados</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class="text-primary">
                            <tr>
                                {{-- <th>ID</th> --}}
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
                            @if (count($asesor->asesorados) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($asesor->asesorados as $proyecto)
                                    <tr>
                                        {{-- <td>{{$proyecto->id}}</td> --}}
                                        <td>{{$proyecto->nombre_proyecto}}</td>
                                        <td>{{$proyecto->modalidad}}</td>
                                        <td>{{$proyecto->descripcion}}</td>
                                        <td>S/ {{$proyecto->presupuesto}}</td>
                                        <td>{{$proyecto->nombre_grupo}}</td>
                                        <td>{{$proyecto->fecha_inicio}}</td>
                                        <td>{{$proyecto->fecha_fin}}</td>
                                        <td>{{$proyecto->estado}}</td>
                                        <td>
                                            <a href="{{route('asesor.asesorados.show', $proyecto->id)}}" class="btn btn-sm btn-info btn-simple " ><i class="tim-icons icon-notes"></i> Ver</a>
                                        </td>                            

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