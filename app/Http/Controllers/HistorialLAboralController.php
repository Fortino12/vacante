<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialLaboral;
use App\Models\User;

class HistorialLAboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historial=HistorialLaboral::find($id);
        return view('Formularios.HistorailLaboral.index',compact('historial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('Formularios.HistorialLaboral.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historial=new HistorialLaboral;
        $historial->fechaIngreso=$request->fechaIngreso;
        $historial->fechaSalida=$request->fechaSalida;
        $historial->tipoContrato=$request->tipoContrato;
        $historial->motivo=$request->motivo;
        $historial->user_id=$request->user_id;
        $historial->save();

        return redirect()->action([HistorialLaboralController::class,'index'])-with('status_success','Historial Agregado');
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
        $historial=HistorialLaboral::fins($id);
        return view('Formularios.HistorialLaboral.update',compact('historial'));
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
        $historial=HistorialLaboral::find($id);
        $historial->fechaIngreso=$request->fechaIngreso;
        $historial->fechaSalida=$request->fechaSalida;
        $historial->tipoContrato=$request->tipoContrato;
        $historial->motivo=$request->motivo;
        $historial->user_id=$request->user_id;
        $historial->save();

        return redirect()->action([HistorialLaboralController::class,'index'])-with('status_success','Historial Agregado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historial=HistorialLaboral::find($id);
        $historial->delete();
        return redirect()->action([HistorialLaboralController::class,'index'])-with('status_success','Historial Eliminado');
    
    }
}
