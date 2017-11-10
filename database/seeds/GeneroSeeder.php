<?php

use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->insert([
        	'descripcion'=>str_random(200)
        ]); 
    }
}
