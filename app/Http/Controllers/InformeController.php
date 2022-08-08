<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeStoreRequest;
use App\Models\Informe;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyecto = Proyecto::where('user_id', Auth::user()->id)->first();
        $informes = $proyecto->informes;

        return view('ejecutor.informes.index', compact('informes', 'proyecto'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformeStoreRequest $request)
    {

        //return $request;

        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/informes/", $nombre_archivo);

        $informe = new Informe();
        $informe->nombre = $request->nombre_informe;
        $informe->descripcion = $request->descripcion;
        $informe->tipo = $request->tipo;
        $informe->proyecto_id = $request->proyecto_id;
        $informe->estado = 'Por revisar';
        $informe->archivo = $nombre_archivo;
        $informe->save();

        return redirect()->route('ejecutor.informes.index')->with('success', '¡Informe subido correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        //return $informe;

        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);
        $informe->delete();

        return redirect()->route('ejecutor.informes.index')->with('success', '¡Informe eliminado correctamente!');



    }
}
