<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

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
        $asesores = Asesor::all();
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
        $user_added = $this->createUser($request->nombres." ".$request->apellidos,  $request->dni,  $request->dni,  'Asesor');

        $asesor = new Asesor();
        $asesor->nombres = $request->nombres;
        $asesor->apellidos = $request->apellidos;
        $asesor->dni = $request->dni;
        // $asesor->ctd_asesorados = 0;
        $asesor->user_id = $user_added;
        $asesor->save();

        return redirect()->route('responsable.asesores.index')->with('success', 'Asesor '.$request->nombres.' registrado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function show(Asesor $asesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Asesor $asesor)
    {
        //
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
        //
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
}
