<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drv;
use App\Models\User;

class DrvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drv=Drv::all();
        return view('Formularios.Drv.index',compact('drv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('Formularios.Drv.create',comapct('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drv=new Drv;
        $drv->drv=$request->drv;
        $drv->user_id=$request->user_id;
        $drv->save();

        return redirect()->action([DrvController::class,'index'])->with('status_success','Drv Agregado');
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
        $drv=Drv::find($id);
        $user=User::all();
        return view('Formularios.Drv.update',compact('drv','user'));
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
        $drv=Drv::find($id);
        $drv->drv=$request->drv;
        $drv->user_id=$request->user_id;
        $drv->save();

        return redirect()->action([DrvController::class,'index'])->with('status_success','Drv Agregado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drv=Drv::find($id);
        $drv->delete();

        return redirect()->action([DrvController::class,'index'])->with('status_success','Drv Eliminado');
    }
}
