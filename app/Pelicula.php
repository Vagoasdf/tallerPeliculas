<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    protected $table='pelicula';
    protected $fillable=['id','descripcion','titulo','director','precio','proveedor_id','genero_id'];

    public function genero(){
    	$this->belongsTo('App\Genero');
    }

    public function proveedor(){
    	$this->belongsTo('App\Proveedor');
    }


}
