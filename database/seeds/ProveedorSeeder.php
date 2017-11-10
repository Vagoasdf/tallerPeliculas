<?php

use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedor')->insert([
        	'nombre'=>str_random(10),
        	'web'=>str_random(100),
        	'direccion'=>str_random(200)
        ]); 
    }
}
