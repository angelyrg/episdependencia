<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Informe;
use App\Models\Proyecto;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsesorController extends Controller
{
    use UserTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesores = Asesor::paginate(6);
        return view("responsable.asesores.index", compact('asesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("responsable.asesores.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['dni' => 'required|digits:8|unique:asesors']);
        $user_added = $this->createUser($request->nombres." ".$request->apellidos,  $request->dni,  $request->dni,  'Asesor');

        $asesor = new Asesor();
        $asesor->nombres = $request->nombres;
        $asesor->apellidos = $request->apellidos;
        $asesor->dni = $request->dni;
        $asesor->user_id = $user_added;
        $asesor->save();

        return redirect()->route('responsable.asesores.index')->with('success', 'Asesor '.$request->nombres.' registrado correctamente.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Asesor $asesor)
    {
        return view("responsable.asesores.edit", compact('asesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asesor $asesor)
    {
        $request->validate(['dni' => 'required|digits:8|unique:asesors,dni,'.$asesor->id,]);

        $this->updateUser($asesor->user_id, $request->nombres." ".$request->apellidos,  $request->dni, $request->dni );

        $asesor->nombres = $request->nombres;
        $asesor->apellidos = $request->apellidos;
        $asesor->dni = $request->dni;
        $asesor->save();
        
        return redirect()->route('responsable.asesores.index')->with('success', 'Asesor '.$request->nombres.' actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asesor $asesor)
    {

        $this->deleteUser($asesor->user_id);
        $asesor->delete();
        
        return redirect()->route('responsable.asesores.index')->with('success', 'Asesor eliminado correctamente.'); 

    }

    public function asesorados(){
        $asesor = Asesor::where('user_id', Auth::user()->id)->first();
        return view('asesor.proyectos.index', compact('asesor'));
    }

    public function asesorado(Proyecto $proyecto){
        return view('asesor.proyectos.show', compact('proyecto'));
    }

    public function informes(){
        $asesor = Asesor::where('user_id', Auth::user()->id)->first();
        $proyectos = $asesor->asesorados;
        foreach($proyectos as $proyecto){
            $informes = Informe::where('proyecto_id', $proyecto->id)->get();
        }
        $informes = (object)$informes;
        return view('asesor.informes.index', compact('informes'));
    }

    public function calificarinforme(Informe $informe, Request $request){
        
        $informe->estado = $request->calificacion;
        $informe->save();

        return redirect()->route('asesor.informes')->with('success', 'Informe calificado');
    }
}
