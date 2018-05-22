<?php

use Illuminate\Database\Seeder;

use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::updateOrCreate([
        	"desc_rol" => "Administrador"
        ]);

        Rol::updateOrCreate([
        	"desc_rol" => "Cliente"
        ]);

        Rol::updateOrCreate([
        	"desc_rol" => "Secretario"
        ]);
    }
}
