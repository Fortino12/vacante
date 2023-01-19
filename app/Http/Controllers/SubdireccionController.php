<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdireccion;
use App\Models\Drv;
use App\Models\Oficina;
use App\Models\User;

class SubdireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdireccion=Subdireccion::all();
        return view('Formularios.Subdireccion.index',compact('subdireccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drv=Drv::all();
        $oficina=Oficina::all();
        $user=User::all();
        return view('Formularios.Subdireccion.create',compact('drv','oficina','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subdireccion=new Subdireccion;
        $subdireccion->nombreSubdireccion=$request->nombreSubdireccion;
        $subdireccion->oficina_id=$request->oficina_id;
        $subdireccion->user_id=$request->user_id;
        $subdireccion->drv_id=$request->drv_id;
        $subdireccion->save();
        return redirect()->action([SubdireccionController::class,'index'])-with('status_success','subdireccion Creada');
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
        $drv=Drv::all();
        $oficina=Oficina::all();
        $user=User::all();
        $subdireccion=Subdireccion::find($id);
        return view('Formularios.Subdireccion.update',compact('drv','oficina','user','subdireccion'));
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
        $subdireccion=Subdireccion::find($id);
        $subdireccion->nombreSubdireccion=$request->nombreSubdireccion;
        $subdireccion->oficina_id=$request->oficina_id;
        $subdireccion->user_id=$request->user_id;
        $subdireccion->drv_id=$request->drv_id;
        $subdireccion->save();
        return redirect()->action([SubdireccionController::class,'index'])-with('status_success','subdireccion Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subdireccion=Subdireccion::find($id);
        $subdireccion->delete();
        return redirect()->action([SubdireccionController::class,'index'])-with('status_success','subdireccion Eliminada');
    }
}
