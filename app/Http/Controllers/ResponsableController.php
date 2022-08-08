<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function informes(){
        $informes = Informe::where('estado', 'Enviado')->orWhere('estado', 'Publicado')->get();

        return view('responsable.informes.index', compact('informes'));
    }

    public function calificarinforme(Informe $informe){
        
        $informe->estado = "Publicado";
        $informe->save();

        $proyecto=Proyecto::find($informe->proyecto_id)->first();
        if ($proyecto->estado == "Inicio"){
            $proyecto->estado = "Parcial";
        }elseif($proyecto->estado == "Parcial"){
            $proyecto->estado = "Completado";
        }
        $proyecto->save();

        return redirect()->route('responsable.informes')->with('success', 'Informe publicado correctamente');
    }
}
