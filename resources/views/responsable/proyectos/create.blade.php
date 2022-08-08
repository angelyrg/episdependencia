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
                        <h4 class="card-title">Nuevo proyecto</h4>
                    </div>
                </div>                
          </div>
          <div class="card-body p-0">

            <!-- Custom Styled Validation -->
            <form action="{{route('responsable.proyectos.store')}}" method="POST" class="row px-5" >
                @csrf

                <div class="form-group col-12">
                    <label for="nombre_proyecto" class="form-label">Descripción del proyecto</label>
                    <input type="text" class="form-control" name="nombre_proyecto" value="{{old('nombre_proyecto')}}" placeholder="Nombre del proyecto" required>
                    <textarea name="descripcion" cols="30" rows="2" class="form-control rounded" placeholder="¿De qué trata el proyecto?" required>{{old('descripcion')}}</textarea>
                </div> 

                <div class="form-group  col-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <label for="modalidad" class="form-label">Modalidad del Proyecto</label>
                            <select name="modalidad" class="form-control">
                                <option class="text-dark">Servicio Social</option>
                                <option class="text-dark">Extensión Cultural</option>
                                <option class="text-dark">Proyección Social</option>
                            </select>
                        </div>
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Presupuesto</label>
                            <input type="number" class="form-control" name="presupuesto" value="{{old('presupuesto')}}" placeholder="1000.00" min="0.00" step="0.10" required >
                        </div>
                    </div>
                </div>


                <div class="form-group  col-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio')}}" required maxlength="8" minlength="8" title="Ingrese un DNI válido" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        </div>
                        <div class=" col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de finalización</label>
                            <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin')}}" required maxlength="8" minlength="8" title="Ingrese un DNI válido" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label for="nombre_grupo" class="form-label">Descripción del grupo</label>
                    <input type="text" class="form-control" name="nombre_grupo" value="{{old('nombre_grupo')}}" placeholder="Nombre del grupo" required>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="usuario" value="{{old('usuario')}}" placeholder="Usuario" required >
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="password" value="{{old('password')}}" placeholder="Contraseña" required >
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
                                    <option class="text-dark" value="{{$asesor->id}}">{{$asesor->nombres." ".$asesor->apellidos}}</option>
                                @endforeach                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="modalidad" class="form-label">Co asesor</label>
                            <select name="coasesor_id" class="form-control">
                                <option value=""  class="text-dark">--Sin coasesor--</option>
                                @foreach ($asesores as $asesor)                                    
                                    <option class="text-dark" value="{{$asesor->id}}">{{$asesor->nombres." ".$asesor->apellidos}}</option>
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