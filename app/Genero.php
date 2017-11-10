<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table='genero';
    protected $fillable=['id','descripcion'];


    public function peliculas(){
    	return $this->hasMany('App\Pelicula');
    }
}
