<?php

namespace App\Http\Controllers;

use App\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Partimos por el Req
        try{
            $proveedor=new Proveedor;
            $proveedor->nombre=$request->nombre;
            $proveedor->web=$request->web;
            $proveedor->direccion=$request->direccion;
        
        }catch( Exception $e ){
            
            \Log::info('Error en el Request '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en el Request','data-error'=>$request->all()]);
        }

        //req Ok? crear!

        try{

            $proveedor->save();

            return \Response::json(['error'=>false,'msj'=> 'creado con Exito', 'data' => $request->all()]);
        }catch( Exception $e ){

            \Log::info('Error en la creación '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en la creación','data-error'=>$proveedor]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        try{
            $proveedor=Proveedor::findOrFail($id);

        }catch(Exception $e){
            \Log::info('proveedor '.$id.' No encontrada');
            return \Response::json(['error'=> true,'msj'=>'proveedor '.$id.' No encontrada']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedor $proveedor)
    {
         try{
            $proveedor=Proveedor::findOrFail($id);
            $proveedor->nombre=$request->nombre;
            $proveedor->web=$request->web;
            $proveedor->direccion=$request->direccion;
            return \Response::json(['error'=>false,'msj'=>'proveedor creado','data'=>$proveedor]);
        }catch(Exception $e){
            \Log::info('Error en el Update: '.$e);
            return \Response::json(['error'=> true,'msj'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(proveedor $proveedor)
    {
        try{
            Proveedor::destroy($id);
            return \Response::json(['error'=>false,'msj'=>'proveedor eliminado con éxito']);
        }catch(Exception $e){
            return \Response::json(['error'=>true,'msj'=>$e]);
        }
    }
}
