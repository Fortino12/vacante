<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mora;
use App\Models\Oficina;

class MoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mora=Mora::all();
        return view('Formularios.Mora.index',compact('mora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficina=Oficina::all();
        return view('Formularios.Mora.create',compact('oficina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mora=new Mora;
        $mora->indice=$request->indice;
        $mora->oficina_id=$request->oficina_id;
        $mora->save();

        return redirect()->action([MoraController::class,'index'])->with('status_success','Mora Agregado');
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
        $mora=Mora::find($id);
        $oficina=Oficina::all();
        return view('Formularios.Mora.update',compact('mora','oficina'));
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
        $mora=Mora::find($id);
        $mora->indice=$request->indice;
        $mora->oficina_id=$request->oficina_id;
        $mora->save();

        return redirect()->action([MoraController::class,'index'])->with('status_success','Mora Editado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mora=Mora::find($id);
        $mora->delete();
        return redirect()->action([MoraController::class,'index'])->with('status_success','Mora Eliminado');
    }
}
