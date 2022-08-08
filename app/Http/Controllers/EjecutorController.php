<?php

namespace App\Http\Controllers;

use App\Models\Ejecutor;
use App\Models\Informe;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EjecutorController extends Controller
{
    public function index(){
        $ejecutores = Ejecutor::paginate(6);

        return view('responsable.ejecutores.index', compact('ejecutores'));

    }
    public function store(Request $request){
        $request->validate(['proyecto_id' => 'exists:proyectos,id']);

        $ejecutor = new Ejecutor();
        $ejecutor->nombres = $request->nombres;
        $ejecutor->apellidos = $request->apellidos;
        $ejecutor->cargo = $request->cargo;
        $ejecutor->ciclo = $request->ciclo;
        $ejecutor->proyecto_id = $request->proyecto_id;
        $ejecutor->save();

        return redirect()->route('responsable.proyectos.show', $request->proyecto_id)->with('success', '¡Ejecutor registrado correctamente!');
    }

    public function destroy(Ejecutor $ejecutor){
        $ejecutor->delete();
        return redirect()->route('responsable.proyectos.show', $ejecutor->proyecto->id)->with('success', '¡Ejecutor eliminado correctamente!');

    }

    public function proyecto(){
        $proyecto = Proyecto::where('user_id', Auth::user()->id)->first();
        return view('ejecutor.proyecto.show', compact('proyecto'));
    }

    public function enviarinforme(Informe $informe){
        $informe->estado = "Enviado";
        $informe->save();

        return redirect()->route('ejecutor.informes.index')->with('success', '¡Informe enviado correctamente al responsable!');

    }
}
