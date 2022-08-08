@extends('layouts.main')

@section('content')
    
<div class="row">

    <div class="col-md-12">

        @include('layouts.alerts')
                
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h4 class="card-title"> Informes</h4>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class="text-primary">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Archivo</th>
                                <th>Fecha</th>
                                <th>Grupo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($informes) == 0)
                                <tr>
                                    <td colspan="8">No hay informes enviados</td>
                                </tr>
                            @else
                                
                                @foreach ($informes->reverse() as $informe)
                                    <tr>
                                        <td>{{$informe->nombre}}</td>
                                        <td>{{$informe->descripcion}}</td>
                                        <td>{{$informe->tipo}}</td>
                                       
                                        <td>
                                            <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" >
                                                <i class="tim-icons icon-cloud-download-93"></i> Descargar
                                            </a>
                                        </td>
                                        <td>{{$informe->created_at->format('Y-m-d')}}</td>
                                        <td>{{$informe->proyecto->nombre_grupo}}</td>
                                        <td>
                                            @if ($informe->estado == "Enviado")

                                                <form action="{{route('responsable.calificarinforme', $informe->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" @if($informe->estado=="Publicado"){{"disabled"}}@endif class="btn btn-sm btn-info btn-simple " >
                                                        <i class="tim-icons icon-check-2"></i> Aceptar informe
                                                    </button>
                                                </form>
                                            @else
                                                <span class="badge badge-@if($informe->estado=="Publicado"){{"success"}}@endif">{{$informe->estado}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @include('asesor.informes.modal-informe-calificate')
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="card-footer">
                {{-- {{ $informes->links() }} --}}
            </div>

        </div>
    </div>
</div>

    


@endsection