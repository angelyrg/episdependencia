<div class="modal fade" id="modal-create-ejecutor" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo ejecutor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('responsable.ejecutores.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    
                    <div class="form-group">
                        <input type="text" class="form-control text-dark" name="nombres" placeholder="Nombres" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-dark" name="apellidos" placeholder="Apellidos" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">Cargo</label>
                                <select name="cargo" class="form-control text-dark">
                                    <option class="text-dark">Integrante</option>
                                    <option class="text-dark">Presidente</option>
                                    <option class="text-dark">Tesorero</option>
                                    <option class="text-dark">Secretario</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">Ciclo</label>
                                <select name="ciclo" class="form-control text-dark">
                                    <option class="text-dark">I</option>
                                    <option class="text-dark">II</option>
                                    <option class="text-dark">III</option>
                                    <option class="text-dark">IV</option>
                                    <option class="text-dark">V</option>
                                    <option class="text-dark">VI</option>
                                    <option class="text-dark">VII</option>
                                    <option class="text-dark">VIII</option>
                                    <option class="text-dark">IX</option>
                                    <option class="text-dark">X</option>
                                </select>
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
