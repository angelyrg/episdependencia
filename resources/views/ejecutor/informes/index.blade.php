@extends('layouts.main')

@section('content')
    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close"><i class="tim-icons icon-simple-remove"></i></button>
                    <span>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </span>
                </div>
            @endif

        <div class="card ">
            <div class="card-header">
                <div class="row">
                        <div class="col-sm-6 text-left">
                            <h4 class="card-title"> Informes</h4>
                        </div>

                        <div class="col-sm-6">
                            <div class="btn-group  float-right" >
                                <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#modal-informe-create">
                                    <i class="fa fa-plus"></i> Subir informe
                                </button>
                                @include('ejecutor.informes.modal-informe-create')
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
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Archivo</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($informes) == 0)
                                <tr>
                                    <td colspan="8">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($informes->reverse() as $informe)
                                    <tr>
                                        <td>{{$informe->id}}</td>
                                        <td>{{$informe->nombre}}</td>
                                        <td>{{$informe->descripcion}}</td>
                                        <td>{{$informe->tipo}}</td>
                                       
                                        <td>
                                            <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" >
                                                <i class="tim-icons icon-cloud-download-93"></i> Descargar
                                            </a>
                                        </td>

                                        <td>
                                            <span class="badge badge-@if($informe->estado=="Aceptado"){{"primary"}}@elseif($informe->estado=="Observado"){{"warning"}}@elseif($informe->estado=="Por revisar"){{"default"}}@elseif($informe->estado=="Enviado"){{"info"}}@elseif($informe->estado=="Publicado"){{"success"}}@endif">{{$informe->estado}}</span>
                                        </td>
                                        <td>{{$informe->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            {{-- <a href="{{route('ejecutor.informes.edit', $informe->id)}}" class="btn btn-sm btn-warning btn-simple " ><i class="tim-icons icon-pencil"></i> Editar</a> --}}

                                            
                                            @if ($informe->estado != "Aceptado" && $informe->estado != "Enviado" && $informe->estado != "Publicado")
                                                <button type="button" @if($informe->estado=="Observado"){{"disabled"}}@endif class="btn btn-sm btn-danger btn-simple" data-toggle="modal" data-target="#modal-informe-delete-{{$informe->id}}">
                                                    <i class="tim-icons icon-trash-simple"></i> Eliminar
                                                </button>                                            
                                            @else
                                                <form action="{{route('ejecutor.enviarinforme', $informe->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" @if($informe->estado=="Publicado" || $informe->estado=="Enviado"){{"disabled"}}@endif class="btn btn-sm btn-info btn-simple " >
                                                        <i class="tim-icons icon-send"></i> Enviar al responsable
                                                    </button>
                                                </form>
                                            @endif
                                            
                                        </td>                            
                                    </tr>                        
                                    @include('ejecutor.informes.modal-informe-delete')
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