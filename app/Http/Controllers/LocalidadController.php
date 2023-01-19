<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;
use App\Models\Municipio;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidad=Localidad::all();
        return view('Formularios.Localidad.index',compact('localidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio=Municipio::all();
        return view('Formularios.Localidad.create',\compact('municipcio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $localidad=new Localidad;
        $localidad_->nombreLocalidad=$request->nombreLocalidad;
        $localidad->municipio_id=$request->municipio_id;
        $localidad->save();
        return redirect()->action([LocalidadController::class,'index'])->with('status_success','localidad Agregada');
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
        $municipio=Municipio::find($id);
        $localidad=Localidad::find($id);
        return view('Formularios.Localidad.update',compact('municipio','localidad'));
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
        $localidad=Localidad::find($id);
        $localidad_->nombreLocalidad=$request->nombreLocalidad;
        $localidad->municipio_id=$request->municipio_id;
        $localidad->save();
        return redirect()->action([LocalidadController::class,'index'])->with('status_success','localidad Editado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localidad=Localidad::find($id);
        $localidad->delete();
        return redirect()->action([LocalidadController::class,'index'])->with('status_success','localidad Eliminado');  
    }
}
