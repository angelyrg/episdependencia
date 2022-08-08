<div class="modal fade" id="modal-informe-create" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo informe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('ejecutor.informes.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                    <div class="form-group">
                        <input type="text" class="form-control text-dark" name="nombre_informe" placeholder="Nombre del informe" required>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" cols="30" rows="2" class="form-control text-dark" placeholder="Descripción del informe"></textarea>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">Tipo de informe</label>
                                <select name="tipo" class="form-control text-dark" required>
                                    <option class="text-dark">Informe Parcial</option>
                                    <option class="text-dark">Informe Final</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="text-dark">Seleccionar documento</label>                                
                                <input type="file" class="form-control text-dark" name="archivo" required >
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="proyecto_id" value="{{$proyecto->id}}">

                </div>
                <div class="modal-footer d-flex justify-content-end">
    
                    <button type="button" class="btn btn-sm btn-secondary btn-simple mx-1" data-dismiss="modal"><i class="tim-icons icon-simple-remove"></i> Cancelar</button>
    
                    <button type="submit" class="btn btn-sm btn-primary mx-1"><i class="tim-icons icon-upload"></i> Guardar</button>
        
                </div>

            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
