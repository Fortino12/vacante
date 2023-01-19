<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipio=Municipio::all();
        return view('Formularios.Municipio.index',compact('municipio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado=Estado::all();
        return view('Formularios.Municipio.create',compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio=new Municipio;
        $municipio->nombreMunicipio=$request->nombreMunicipio;
        $municipio->estado_id=$request->estado_id;
        $municipio->save();
        return redirect()->action([MunicipioController::class,'index'])->with('status_success','municipio Agregado');
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
        $estado=Estado::all();
        $municipio=Municipio::find($id);
        return view('Formularios.Municipio.update',compact('estado','municipio'));
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
        $municipio=Municipio::find($id);
        $municipio->nombreMunicipio=$request->nombreMunicipio;
        $municipio->estado_id=$request->estado_id;
        $municipio->save();
        return redirect()->action([MunicipioController::class,'index'])->with('status_success','municipio Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio=Municipio::find($id);
        $municipio->delete();
        return redirect()->action([MunicipioController::class,'index'])->with('status_success','municipio Eliminado');
    }
}
