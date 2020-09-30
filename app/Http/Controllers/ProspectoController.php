<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Prospecto;
use App\Documento;
use Auth;

class ProspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if(Auth::check()){
      $prospecto=DB::table('prospectos')->
      leftjoin('estados','estados.id_estados','=','prospectos.estatus')->
      leftjoin('promotores','promotores.id_promotor','=','prospectos.promotor_id')->
      select('id_prospecto','nombre_prospecto','prospectos.primer_apellido','prospectos.segundo_apellido','estado')->
      where('promotor_id',Auth()->user()->id_promotor)->get();
      return Response::json($prospecto,200);
    }else{
        return Response::json('Unauthorized',401);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    } 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
     $rules = [
            'ine'   => 'required',
            'acta_nacimiento'  => 'required',
            'comprobante_pago'=>'required',
        ];
       $messages = [
        'ine.required' => 'Por favor carga el documento INE',
        'acta_nacimiento.required' => 'Por favor carga el documento ACTA DE NACIMIENTO',
        'comprobate_pago.required'=>'Por favor carga el documento COMPROBANTE DE PAGO'
   
        ]; 
    $this->validate($request, $rules, $messages);
        $prospecto=new Prospecto();
        $documento=new Documento();
        $prospecto->nombre_prospecto=$request->nombre_prospecto;
        $prospecto->primer_apellido=$request->primer_apellido;
        $prospecto->segundo_apellido=$request->segundo_apellido;
        $prospecto->calle=$request->calle;
        $prospecto->numero=$request->numero;
        $prospecto->colonia=$request->colonia;
        $prospecto->cp=$request->cp;
        $prospecto->telefono=$request->telefono;
        $prospecto->rfc=$request->rfc;
        $prospecto->promotor_id=1;
        $prospecto->save();
        if($request->ine  && $request->acta_nacimiento && $request->comprobante_pago){
        $documento->id_pro_doc=$prospecto->id_prospecto;
        $file1=$request->file('ine');
        $file2=$request->file('acta_nacimiento');
        $file3=$request->file('comprobante_pago');
        $ine=date_format(now(),"His")."_ine".$file1->getClientOriginalName();
        $acta_nacimiento=date_format(now(),"His")."_acta".$file2->getClientOriginalName();
        $comprobante_pago=date_format(now(),"His")."_comprobante".$file3->getClientOriginalName();
        $file1->move('storage',$ine);
        $file2->move('storage',$acta_nacimiento);
        $file3->move('storage',$comprobante_pago);
        $documento->ine=$ine;
        $documento->acta_nacimiento=$acta_nacimiento;
        $documento->comprobante_pago=$comprobante_pago;
        $documento->save();
        }
        return Response::json($prospecto,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
        $prospecto=DB::table('prospectos')->
        leftjoin('estados','estados.id_estados','=','prospectos.estatus')->
        leftjoin('documentos','documentos.id_pro_doc','=','prospectos.id_prospecto')->
        select('nombre_prospecto','primer_apellido','segundo_apellido','calle','numero',
        'colonia','cp','telefono','rfc','estado','observaciones','ine','comprobante_pago','acta_nacimiento')->where('id_prospecto',$id)->get();
        return Response::json($prospecto,200);
    }else{
      return ([Response::HTTP_Unauthorized,401]);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       if(Auth::check()){
       $prospecto=Prospecto::find($id);
       $prospecto->observaciones=$request->observaciones;
       $prospecto->estatus=$request->estatus;
       $prospecto->update();
       return Response::json($prospecto,204);
       }else{
         return ([Response::HTTP_Unauthorized,401]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prospecto=Prospecto::find($id);
        $prospecto->delete();
    }
}
