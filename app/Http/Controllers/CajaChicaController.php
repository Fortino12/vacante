<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CajaChica;
use App\Models\User;

class CajaChicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajas=CajaChica::all();
        return view('Formularios.CajaChinca.index',compact('cajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('Formularios.CajaChica,create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caja=new CajaChica;
        $caja->presupuesto=$request->presupuesto;
        $caja->periodo=$requeste->periodo;
        $caja->user_id=$request->user_id;
        $caja->save();

        return redirect()->action([CajaChicaController::class,'index'])->with('status_success','Caja Creado');
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
        $caja=CajaChica::find($id);
        return view('Formularios.CajaChica.update',compact('caja'));
    
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
        $caja=CajaChica::find($id);
        $caja->presupuesto=$request->presupuesto;
        $caja->periodo=$requeste->periodo;
        $caja->user_id=$request->user_id;
        $caja->save();

        return redirect()->action([CajaChicaController::class,'index'])->with('status_success','Caja Creado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caja=CajaChica::finc($id);
        $caja->delete();

        return redirect()->action([CajaChicaController::class,'index'])->with('status_success','Caja Eliminada.');
    }
}
