<?php


namespace App\Traits;

use App\Models\Asesor;
use App\Models\Informe;
use Exception;
use Illuminate\Support\Facades\File;

trait ProyectoTrait{

    public function deleteInforme($informe_id){
        $informe = Informe::findOrFail($informe_id);
        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);
    }

    

}