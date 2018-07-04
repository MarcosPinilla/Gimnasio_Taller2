<?php

use Illuminate\Database\Seeder;

use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::updateOrCreate([
        	"nombre" => "Daniel Enoc",
            "apellido" => "Coronado Mendoza",
        ]);

        Cliente::updateOrCreate([
        	"nombre" => "Felipe",
            "apellido" => "Acuña",
        ]);

        Cliente::updateOrCreate([
        	"nombre" => "Marcos",
            "apellido" => "Pinilla",
        ]);
    }
}
