<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Oficina;
use App\Models\User;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horario=Horario::all();
        return view('Formularios.Horario.index',compact('horario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        $Oficina=Oficina::all();
        return view('Formularios.Horario.create',compact('user','oficina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario=new Horario;
        $horario->fecha=$request->fecha;
        $horario->horaEntrada=$request->horaEntrada;
        $horario->horaSalida=$request->horaSalida;
        $horario->oficina_id=$request->oficina_id;
        $horario->user_id=$request->user_id;
        $horario->save();

        return redirect()->action([HorarioController::class,'index'])->with('status_success','horario Creado');
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
        $user=User::all();
        $Oficina=Oficina::all();
        $horario=Horario::find($id);
        return view('Formularios.Horario.update',compact('user','oficina','horario'));
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
        $horario=Horario::find($id);
        $horario->fecha=$request->fecha;
        $horario->horaEntrada=$request->horaEntrada;
        $horario->horaSalida=$request->horaSalida;
        $horario->oficina_id=$request->oficina_id;
        $horario->user_id=$request->user_id;
        $horario->save();

        return redirect()->action([HorarioController::class,'index'])->with('status_success','horario Editado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario=Horario::find($id);
        $horario->delete();
        return redirect()->action([HorarioController::class,'index'])->with('status_success','horario Eliminado');
    }
}
