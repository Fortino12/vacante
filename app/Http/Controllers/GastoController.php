<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gasto=Gasto::all();
        return view('Formularios.Gasto.index',compact('gasto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Gasto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gasto=new Gasto;
        $gasto->tipoGasto=$request->tipoGasto;
        $gasto->save();

        return redirect()->action([GastoController::class,'index'])->with('status_success','gasto Agregado');
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
        $gasto=Gasto::find($id);

        return view('Formularios.Gasto.update',compact('gasto'));
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
        $gasto=new Gasto;
        $gasto->tipoGasto=$request->tipoGasto;
        $gasto->save();

        return redirect()->action([GastoController::class,'index'])->with('status_success','gasto Agregado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasto=Gasto::find($id);
        $gasto->delete();
        return redirect()->action([GastoController::class,'index'])->with('status_success','gasto Eliminado');
    }
}
