<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puesto=Puesto::all();
        return view('Formularios.Puesto.index',compact('puesto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto=new Puesto;
        $puesto->nombrePuesto=$request->nombrePuesto;
        $puesto->descripcion=$request->descripcion;
        $puesto->save();

        return redirect()->action([PuestoController::class,'index'])->with('status_success','Puesto Agregado');
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
        $puesto=Puesto::find($id);
        return view('Formularios.Puesto.update',compact('puesto'));
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
        $puesto=Puesto::find($id);
        $puesto->nombrePuesto=$request->nombrePuesto;
        $puesto->descripcion=$request->descripcion;
        $puesto->save();

        return redirect()->action([PuestoController::class,'index'])->with('status_success','Puesto Agregado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puesto=Puesto::find($id);
        $puesto->delete();
        return redirect()->action([PuestoController::class,'index'])->with('status_success','Puesto Eliminado');
    }
}
