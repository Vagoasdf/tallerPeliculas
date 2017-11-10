<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
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
            $pelicula=new Pelicula;
            $pelicula->titulo=$request->nombre;
            $pelicula->director=$request->director;
            $pelicula->descripcion=$request->descripcion;
            $pelicula->precio=$request->precio;
            $pelicula->genero_id=$request->genero;
            $pelicula->proveedor_id=$request->proveedor;
        
        }catch( Exception $e ){
            
            \Log::info('Error en el Request '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en el Request','data-error'=>$request->all()]);
        }

        //req Ok? crear!

        try{

            $pelicula->save();

            return \Response::json(['error'=>false,'msj'=> 'creado con Exito', 'data' => $request->all()]);
        }catch( Exception $e ){

            \Log::info('Error en la creación '.$e);
            return \Response::json(['error' => true,'msj' =>'Error en la creación','data-error'=>$pelicula]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        

        try{
            $pelicula=Pelicula::findOrFail($id);
            return $pelicula;

        }catch(Exception $e){
            \Log::info('Pelicula '.$id.' No encontrada');
            return \Response::json(['error'=> true,'msj'=>'Pelicula '.$id.' No encontrada']);
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try{
            $pelicula=Pelicula::findOrFail($id);
            $pelicula->titulo=$request->nombre;
            $pelicula->director=$request->director;
            $pelicula->descripcion=$request->descripcion;
            $pelicula->precio=$request->precio;
            $pelicula->genero_id=$request->genero;
            $pelicula->proveedor_id=$request->proveedor;
            return \Response::json(['error'=>false,'msj'=>'pelicula creado','data'=>$pelicula]);
        }catch(Exception $e){
            \Log::info('Error en el Update: '.$e);
            return \Response::json(['error'=> true,'msj'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try{
            Pelicula::destroy($id);
            return \Response::json(['error'=>false,'msj'=>'Pelicula eliminada con éxito']);
        }catch(Exception $e){
            return \Response::json(['error'=>true,'msj'=>$e]);
        }
    }
}
