<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\Localidad;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direccion=Direccion::all();
        return view('Formularios.Direccion.index',compact('direccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localidad=Localidad::all();
        return view('Formularios.Direccion.create',compact('localidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direccion=new Direccion;
        $direccion->calle=$request->calle;
        $direccion->codigoPostal=$request->codigoPostal;
        $direccion->colonia=$request->colonia;
        $direccion->referencia=$request->referencia;
        $direccion->localidad_id=$request->localidad_id;
        $direccion->save();

        return redirect()->action([DireccionController::class,'index'])->with('status_success','DireccionAgregada');
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
        $direccion=Direccion::find($id);
        $localidad=Localidad::all();

        return view('Formularios.Direccion.update',compact('direccion','localidad'));
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
        $direccion=Direccion::find($id);
        $direccion->calle=$request->calle;
        $direccion->codigoPostal=$request->codigoPostal;
        $direccion->colonia=$request->colonia;
        $direccion->referencia=$request->referencia;
        $direccion->localidad_id=$request->localidad_id;
        $direccion->save();

        return redirect()->action([DireccionController::class,'index'])->with('status_success','DireccionAgregada');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion=Direccion::find($id);
        $direccion->delete();

        return redirect()->action([DireccionController::class,'index'])->with('status_success','direccion Eliminada');
    }
}
