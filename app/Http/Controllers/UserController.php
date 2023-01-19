<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Puesto;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('Formularios.User.index',compact($user));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puesto=Puesto::all();
        return view('Formuarios.User.create',compact('puesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User;
        $user->numeroNomina=$request->numeroNomina;
        $user->nombre=$request->nombre;
        $user->paterno=$request->paterno;
        $user->materno=$request->materno;
        $user->email=$request->email;
        $user->password=bcrypt($request['password']);
        $user->telefono=$request->telefono;
        $user->fechaNacimiento=$request->fechaNacimiento;
        $user->foto=$request->fot;
        $user->puesto_id=$request->puesto_id;
        $user->save();

        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario Agregado');
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
        $puesto=Puesto::all();
        $user=User::find($id);
        return view('Formuarios.User.create',compact('puesto','user'));
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
        $user=User::find($id);
        $user->numeroNomina=$request->numeroNomina;
        $user->nombre=$request->nombre;
        $user->paterno=$request->paterno;
        $user->materno=$request->materno;
        $user->telefono=$request->telefono;
        $user->fechaNacimiento=$request->fechaNacimiento;
        $user->foto=$request->fot;
        $user->puesto_id=$request->puesto_id;
        $user->save();

        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario Eliminado');
    }
}
