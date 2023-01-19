<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Models\CajaChica;
use App\Models\Facturacion;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturacion=Facturacion::all();
        return view('Formularios.Facturacion.index',compact('facturacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gatos=Gasto::all();
        $caja=CajaChica::al();

        return view('Formularios.Facturacion.create',compact('gastos','caja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facturacion=new Facturacion;
        $facturacion->monto=$request->facturacion;
        $facturacion->comprobante=$request->comprobante;
        $facturacion->fechaFacturacion=$request->fechaFacturacion;
        $facturacion->caja_id=$request->caja_id;
        $facturacion->gasto_id=$request->gasto_id;
        $facturacion->save();

        return redirect()->action([FacturacionController::class,'index'])->with('status_success','Facturacion Agregado');
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
        $facturacion=Facturacion::find($id);
        $gasto=Gasto::all();
        $caja=CajaChica::all();

        return view('Formularios.Facturacion.update',compact('facturacion','gasto','caja'));
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
        $facturacion=Facturacion::find($id );
        $facturacion->monto=$request->facturacion;
        $facturacion->comprobante=$request->comprobante;
        $facturacion->fechaFacturacion=$request->fechaFacturacion;
        $facturacion->caja_id=$request->caja_id;
        $facturacion->gasto_id=$request->gasto_id;
        $facturacion->save();
        return redirect()->action([FacturacionController::class,'index'])->with('status_succes','facturacion Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facturacion=Facturacion::find($id);
        $facturacion->delete();
        return redirect()->action([FacturacionController::class,'index'])->with('status_succes','facturacion Eliminada');
    }
}
