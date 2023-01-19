<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esatdo;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado=Estado::all();
        return view('Formularios.Estado.index',compact('estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado=new Estado;
        $estado->nombreEstado=$request->nombreEstado;
        $estado->save();

        return redirect()->action([EstadoController::class,'index'])->with('status->success','Estado Agregado');
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
        $estado=Estado::find($id);
        return view('Formuarios.Estado.update',compact('estado'));
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
        $estado=Estado::find($id);
        $estado->nombreEstado=$request->nombreEstado;
        $estado->save();

        return redirect()->action([EstadoController::class,'index'])->with('status_success','Estado Agregado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado=Estado::find($id);
        $estado->delete();
        return redirect()->action([EstadoController::class,'index'])->with('status_success','Estado eliminado');
    }
}
