<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Ejecutor;
use App\Models\Proyecto;
use App\Models\User;
use App\Traits\ProyectoTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    use UserTrait;
    use ProyectoTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::paginate(6);
        //return $proyectos;
        return view("responsable.proyectos.index", compact('proyectos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asesores = Asesor::all();
        return view("responsable.proyectos.create", compact('asesores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'presupuesto' => 'required|numeric', 
            'usuario'=>'unique:users,username', 
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'asesor_id'=>'required|exists:asesors,id', 
            'coasesor_id'=>'nullable|exists:asesors,id|different:asesor_id']);


        $user_added = $this->createUser($request->nombre_grupo,  $request->usuario,  $request->password,  'Ejecutor');

        $proyecto = new Proyecto();
        $proyecto->modalidad = $request->modalidad;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->presupuesto = $request->presupuesto;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;
        $proyecto->nombre_grupo = $request->nombre_grupo;
        $proyecto->estado = "Inicio";
        $proyecto->user_id = $user_added;
        
        $proyecto->save();


        if ($request->coasesor_id == null){
            $proyecto->asesores()->attach([$request->asesor_id]);   
            //$this->addAsesor([$request->asesor_id]);
        }else{
            $proyecto->asesores()->attach([$request->asesor_id, $request->coasesor_id]);   
            //$this->addAsesor([$request->asesor_id, $request->coasesor_id]);
        }

        return redirect()->route('responsable.proyectos.show', $proyecto->id)->with('info', '¡Proyecto creado con éxito! Agregue los ejecutores de este proyecto.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        $usuario = User::Find($proyecto->user_id);
        return view('responsable.proyectos.show', compact('proyecto', 'usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $asesores = Asesor::all();
        $usuario = User::find($proyecto->user_id);

        return view("responsable.proyectos.edit", compact('proyecto', 'asesores', 'usuario'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        

        $user = User::findOrFail($proyecto->user_id);

        //return $user;

        $request->validate([
            'presupuesto' => 'required|numeric', 
            'usuario' => 'required|unique:users,username,'.$user->id,
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'asesor_id'=>'required|exists:asesors,id',
            'coasesor_id'=>'nullable|exists:asesors,id|different:asesor_id']);

        $this->updateUser($user->id, $request->nombre_grupo,  $request->usuario,  $request->password);

        $proyecto->modalidad = $request->modalidad;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->presupuesto = $request->presupuesto;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;
        $proyecto->nombre_grupo = $request->nombre_grupo;
        
        $proyecto->save();

        if ($request->coasesor_id == null){
            $proyecto->asesores()->sync([$request->asesor_id]);
        }else{
            $proyecto->asesores()->sync([$request->asesor_id, $request->coasesor_id]);
        }

        return redirect()->route('responsable.proyectos.index', $proyecto->id)->with('success', '¡Proyecto actualizado correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {

        $this->deleteUser($proyecto->user_id);

        foreach ($proyecto->informes as $informe) {
            $this->deleteInforme($informe->id);
        }

        $proyecto->delete();
        return redirect()->route('responsable.proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 

    }
}


// C R U D