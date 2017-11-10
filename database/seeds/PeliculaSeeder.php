<?php

use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelicula')->insert([
        	'titulo'=>str_random(10),
        	'director'=>str_random(10),
        	'precio'=>'9999',
        	'descripcion'=>str_random(200),
        	'proveedor_id'=>1,
        	'genero_id'=>1
        ]);  
    }
}
