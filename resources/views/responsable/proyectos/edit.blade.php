@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card ">

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

        
          <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h4 class="card-title">Editar proyecto</h4>
                    </div>
                </div>                
          </div>
          <div class="card-body p-0">

            <!-- Custom Styled Validation -->
            <form action="{{route('responsable.proyectos.update', $proyecto->id)}}" method="POST" class="row px-5" >
                @csrf
                @method('PUT')

                <div class="form-group col-12">
                    <label for="nombre_proyecto" class="form-label">Descripción del proyecto</label>
                    <input type="text" class="form-control" name="nombre_proyecto" value="@if(!old('nombre_proyecto')){{$proyecto->nombre_proyecto}}@else{{old('nombre_proyecto')}}@endif" placeholder="Nombre del proyecto" required>
                    <textarea name="descripcion" cols="30" rows="2" class="form-control rounded" placeholder="¿De qué trata el proyecto?">@if(!old('descripcion')){{$proyecto->descripcion}}@else{{old('descripcion')}}@endif</textarea>
                </div> 

                <div class="form-group  col-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <label for="modalidad" class="form-label">Modalidad del Proyecto</label>
                            <select name="modalidad" class="form-control">
                                <option class="text-dark" @if($proyecto->modalidad=="Servicio Social"){{"selected"}}@endif>Servicio Social</option>
                                <option class="text-dark" @if($proyecto->modalidad=="Extensión Cultural"){{"selected"}}@endif>Extensión Cultural</option>
                                <option class="text-dark" @if($proyecto->modalidad=="Proyección Social"){{"selected"}}@endif>Proyección Social</option>
                            </select>
                        </div>
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Presupuesto</label>
                            <input type="number" class="form-control" name="presupuesto" value="@if(!old('presupuesto')){{$proyecto->presupuesto}}@else{{old('presupuesto')}}@endif" placeholder="1000.00" min="0.00" step="0.10" required >
                        </div>
                    </div>
                </div>


                <div class="form-group  col-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" value="@if(!old('fecha_inicio')){{$proyecto->fecha_inicio}}@else{{old('fecha_inicio')}}@endif" required >
                        </div>
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de finalización</label>
                            <input type="date" class="form-control" name="fecha_fin" value="@if(!old('fecha_fin')){{$proyecto->fecha_fin}}@else{{old('fecha_fin')}}@endif" required >
                        </div>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label for="nombre_grupo" class="form-label">Descripción del grupo</label>
                    <input type="text" class="form-control" name="nombre_grupo" value="@if(!old('nombre_grupo')){{$proyecto->nombre_grupo}}@else{{old('nombre_grupo')}}@endif" placeholder="Nombre del grupo" required>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="usuario" value="@if(!old('usuario')){{$usuario->username}}@else{{old('usuario')}}@endif" placeholder="Usuario" required >
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="password" value="@if(!old('password')){{""}}@else{{old('password')}}@endif" placeholder="Contraseña" required >
                        </div>
                    </div>
                </div> 
                

                <div class="form-group col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="modalidad" class="form-label">Asesor</label>
                            <select name="asesor_id" class="form-control">
                                <option value="" disabled selected>--Selecione asesor--</option>
                                @foreach ($asesores as $asesor)                                    
                                    <option class="text-dark" @if($asesor->id == $proyecto->asesores->first()->id){{"selected"}}@endif value="{{$asesor->id}}">{{$asesor->nombres." ".$asesor->apellidos}}</option>
                                @endforeach                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="modalidad" class="form-label">Co asesor</label>
                            <select name="coasesor_id" class="form-control">
                                <option value=""  class="text-dark">--Sin coasesor--</option>
                                @foreach ($asesores as $asesor)
                                    @if (count($proyecto->asesores) == 2)                                    
                                        <option class="text-dark" @if($asesor->id == $proyecto->asesores->get(1)->id){{"selected"}}@endif value="{{$asesor->id}}">{{$asesor->nombres." ".$asesor->apellidos}}</option>
                                    @else
                                        <option class="text-dark"  value="{{$asesor->id}}">{{$asesor->nombres." ".$asesor->apellidos}}</option>                                        
                                    @endif
                                @endforeach                                
                            </select>
                        </div>
                    </div>
                </div>



                
                <div class="col-12 d-flex justify-content-center mt-4">
                    <a href="{{route('responsable.proyectos.index')}}" class="btn btn-secondary m-2 " ><i class="fa fa-times"></i> Cancelar</a>

                    <button class="btn btn-primary m-2" type="submit"><i class="fa fa-save"></i> Guardar datos</button>
                </div>
                
            </form><!-- End Form -->




            
          </div>
        </div>
    </div>
</div>

@endsection