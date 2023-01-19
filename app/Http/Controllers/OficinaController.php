<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficina;
use App\Models\User;
use App\Models\Localidad;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficina=Oficina::all();
        return view('Formularios.Oficina.index',compact('oficina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localidad=Localidad::all();
        $user=User::all();
        return view('Formularios.Oficina.create',compat('user','localidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina=new Oficina;
        $oficina->oficina=$request->oficina;
        $oficina->tipo=$request->tipo;
        $oficina->email=$request->email;
        $oficina->localidad_id=$request->localidad_id;
        $oficina->user_id=$request->user_id;
        $oficina->save();

        return redirect()->action([OficinaController::class,'index'])->with('status_success','Oficina Agregada');
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
        $oficina=Oficina::find($id);
        $localidad=Localidad::all();
        $user=User::all();
        return view('Formularios.Oficina.update',compact('oficina','localidad','user'))->with('status_success','Oficina Editada');
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
        $oficina=Oficina::find($id);
        $oficina->oficina=$request->oficina;
        $oficina->tipo=$request->tipo;
        $oficina->email=$request->email;
        $oficina->localidad_id=$request->localidad_id;
        $oficina->user_id=$request->user_id;
        $oficina->save();

        return redirect()->action([OficinaController::class,'index'])->with('status_success','Oficina Agregada');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oficina=Oficina::find($id);
        $oficina->delete();
        return redirect()->action([OficinaController::class,'index'])->with('status_success','Oficina Eliminada');
    }
}
