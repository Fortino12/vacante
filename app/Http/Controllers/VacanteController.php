<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Puesto;
use App\Models\Vacante;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacante=Vacante::all();
        return view('Formularios.Vacante.index',compact($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puesto=Puesto::all();
        $municipio=Municipio::all();
        return view('Formularios.Vacante.create',compact('puesto','municipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacante=new Vacante;
        $vacante->nombreVacante=$request->nombreVacante;
        $vacante->numVacante=$request->numVacante;
        $vacante->puesto_id=$request->puesto_id;
        $vacante->municipio_id=$request->municipio_id;
        $vacante->save();
        return redirect()->action([VacanteController::class,'index'])->with('status_success','Vacante Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto=Puesto::all();
        $municipio=Municipio::all();
        $vacante=Vacante::find($id);
        return view('Formularios.Vacante.create',compact('puesto','vacante','municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vacante=Vacante::find($id);
        $vacante->nombreVacante=$request->nombreVacante;
        $vacante->numVacante=$request->numVacante;
        $vacante->puesto_id=$request->puesto_id;
        $vacante->municipio_id=$request->municipio_id;
        $vacante->save();
        return redirect()->action([VacanteController::class,'index'])->with('status_success','Vacante Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacante=Vacante::find($id);
        $vacante->delete();
        return redirect()->action([VacanteController::class,'index'])->with('status_success','Vacante Eliminada');
    }
}
