<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Direccion;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos=Candidato::all();
        return view('Formularios.Candidato.index',compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccion=Direccion::all();
        return view('Formularios.Candidato.create',compact('direccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidato=new Candidato;
        $candidato->nombre=$request->nombre;
        $candidato->paterno=$requeste->paterno;
        $candidato->materno=$request->materno;
        $candidato->fechaNacimiento=$request->fechaNacimiento;
        $candidato->nivelEstudio=$request->nivelEstudio;
        $candidato->email=$request->email;
        $candidato->telefono=$request->telefono;
        $candidato->curp=$request->curp;
        $candidato->rfc=$request->rfc;
        $candidato->foto=$request->foto;
        $candidato->estatus=$request->estatus;
        $candidato->direccion=$request->direccion;
        $candidato->save();

        return redirect()->action([CandidatoController::class,'index'])->with('status_success','candidato Registrado');
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
        $candidato=Candidato::find($id);
        return view('Formularios.Candidatos.update',compact('candidato'));
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
        $candidato=Candidato::find($id);
        $candidato->nombre=$request->nombre;
        $candidato->paterno=$requeste->paterno;
        $candidato->materno=$request->materno;
        $candidato->fechaNacimiento=$request->fechaNacimiento;
        $candidato->nivelEstudio=$request->nivelEstudio;
        $candidato->email=$request->email;
        $candidato->telefono=$request->telefono;
        $candidato->curp=$request->curp;
        $candidato->rfc=$request->rfc;
        $candidato->foto=$request->foto;
        $candidato->estatus=$request->estatus;
        $candidato->direccion=$request->direccion;
        $candidato->save();

        return redirect()->action([CandidatoController::class,'index'])->with('status_success','candidato Editado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato=Candidato::find($id);
        $candidato->delete();

        return redirect()->action([CandidatoController::class,'index'])->with('status_success','candidato eliminado');
    }
}
