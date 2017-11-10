<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';
    protected $fillable=['id','nombre','web','direccion'];


    public function peliculas(){
    	return $this->hasMany('App\Pelicula');
    }
}
