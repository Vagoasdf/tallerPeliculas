<?php

namespace App\Http\Controllers;

use App\genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
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
            $genero=new Genero;
            $genero->descripcion=$request->descripcion;
           
        
        }catch( Exception $e ){
            
            \Log::info('Error en el Request '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en el Request','data-error'=>$request->all()]);
        }

        //req Ok? crear!

        try{

            $genero->save();

            return \Response::json(['error'=>false,'msj'=> 'creado con Exito', 'data' => $request->all()]);
        }catch( Exception $e ){

            \Log::info('Error en la creación '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en la creación','data-error'=>$genero]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $genero=Genero::findOrFail($id);
            return $genero;

        }catch(Exception $e){
            \Log::info('genero '.$id.' No encontrada');
            return \Response::json(['error'=> true,'msj'=>'genero '.$id.' No encontrada']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Genero $genero)
    {
        try{
            $genero=Genero::findOrFail($id);
            $genero->descripcion=$request->descripcion;
            $genero->save();
            return \Response::json(['error'=>false,'msj'=>'genero creado','data'=>$genero]);
        }catch(Exception $e){
            \Log::info('Error en el Update: '.$e);
            return \Response::json(['error'=> true,'msj'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            Genero::destroy($id);
            return \Response::json(['error'=>false,'msj'=>'Genero eliminado con éxito']);
        }catch(Exception $e){
            return \Response::json(['error'=>true,'msj'=>$e]);
        }
    }
}
