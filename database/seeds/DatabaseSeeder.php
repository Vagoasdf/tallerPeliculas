<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(GeneroSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(PeliculaSeeder::class);
    }
}
