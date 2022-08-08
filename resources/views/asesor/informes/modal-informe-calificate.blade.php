<div class="modal fade" id="modal-informe-calificate-{{$informe->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Calificar informe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('asesor.calificarinforme', $informe->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="col-12">
                        <p><b>Grupo: </b> {{$informe->proyecto->nombre_grupo}} </p>
                        
                    </div>
                    <div class="col-12">
                        <p><b>Informe:</b></p>
                        <p>{{$informe->nombre}}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">Calificar informe</label>
                                <select name="calificacion" class="form-control text-dark" required>
                                    <option class="text-dark" value="Aceptado">Aceptar</option>
                                    <option class="text-dark" value="Observado">Obervar</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
    
                    <button type="button" class="btn btn-sm btn-secondary btn-simple mx-1" data-dismiss="modal"><i class="tim-icons icon-simple-remove"></i> Cancelar</button>
    
                    <button type="submit" class="btn btn-sm btn-primary mx-1"><i class="tim-icons icon-upload"></i> Guardar</button>
        
                </div>

            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
