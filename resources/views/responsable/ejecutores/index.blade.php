@extends('layouts.main')

@section('content')
    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">
            <div class="card-header">
                <div class="row">
                        <div class="col-sm-6 text-left">
                            <h4 class="card-title"> Ejecutores</h4>
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
                                <th>Ciclo</th>
                                <th>Cargo</th>
                                <th>Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($ejecutores) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($ejecutores as $ejecutor)
                                    <tr>
                                        <td>{{$ejecutor->id}}</td>
                                        <td>{{$ejecutor->nombres}}</td>
                                        <td>{{$ejecutor->apellidos}}</td>
                                        <td>{{$ejecutor->ciclo}}</td>
                                        <td>{{$ejecutor->cargo}}</td>
                                        <td>{{$ejecutor->proyecto->nombre_grupo}}</td>
                              
                                    </tr>                        
                                   
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="card-footer">
                {{ $ejecutores->links() }}
            </div>
        </div>
    </div>
</div>

    


@endsection