

@if ($message = Session::get('success'))

    <div class="alert alert-success">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span><b><i class="tim-icons icon-check-2"></i> ¡Correcto! - </b> {{ $message }}</span>
    </div>


@elseif($message = Session::get('danger'))

    <div class="alert alert-danger">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span><b><i class="tim-icons icon-simple-remove"></i> ¡Error! - </b> {{ $message }}</span>
    </div>

@elseif($message = Session::get('info'))

    <div class="alert alert-info">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span><b><i class="tim-icons icon-alert-circle-exc"></i> ¡Aviso! - </b> {{ $message }}</span>
    </div>
    

@endif


