<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requesicion;
use App\Models\Oficina;

class RequesicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requesicion=Requesicion::all();
        return view('Formularios.Requesicion.index',compact('requesicion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficina=Oficina::all();
        return view('Formularios.Requesicion.create',compact('oficina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requesicion=new Requesicion;
        $requesicion->fechaApertura=$requesicion->fechaApertura;
        $requesicion->fechaCierre=$requesicion->fechaCierre;
        $requesicion->oficina_id=$requesicion->oficina_id;
        $requesicion->save();
        return redirect()->action([RequesicionController::class,'index'])->with('status_success','Requesicion Agregada');
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
        $requesicion=Requesicion::find($id);
        $oficina=Oficina::all();
        return view('Formularios.Requesicion.update',compact('requesicion','oficina'));
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
        $requesicion=Requesicion::find($id);
        $requesicion->fechaApertura=$requesicion->fechaApertura;
        $requesicion->fechaCierre=$requesicion->fechaCierre;
        $requesicion->oficina_id=$requesicion->oficina_id;
        $requesicion->save();
        return redirect()->action([RequesicionController::class,'index'])->with('status_success','Requesicion Editada');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requesicion=Requesicion::find($id);
        $requesicion->delete();
        return redirect()->action([RequesicionController::class,'index'])->with('status_success','Requesicion Eliminada');
    
    }
}
