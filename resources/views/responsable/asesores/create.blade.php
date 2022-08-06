@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card ">
          <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h4 class="card-title">Nuevo asesor</h4>
                    </div>
                </div>
                
          </div>
          <div class="card-body">

            <!-- Custom Styled Validation -->
            <form action="{{route('responsable.asesores.store')}}" method="POST" class="row px-5" >
                @csrf


                <div class="row">
                    <div class="col-lg-12">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div> <!--End Mensajes de error-->
            

                <div class="form-group col-12">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}"  required>
                </div> <!--End Input Nombre-->

                <div class="form-group col-12">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}"  required>
                </div> <!--End Input Apellidos-->

                <div class="form-group col-12">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" value="{{old('dni')}}" required maxlength="8" minlength="8" title="Ingrese un DNI válido" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div> <!--End Input DNI-->


                
                <div class="col-12 d-flex justify-content-center mt-4">
                    <a href="{{route('responsable.asesores.index')}}" class="btn btn-secondary m-2 " ><i class="fa fa-times"></i> Cancelar</a>

                    <button class="btn btn-primary m-2" type="submit"><i class="fa fa-save"></i> Guardar datos</button>
                </div>
                
            </form><!-- End Form -->




            
          </div>
        </div>
    </div>
</div>

@endsection