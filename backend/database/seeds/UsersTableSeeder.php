<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
        	"usu_correo" => "d.coronado01@ufromail.cl",
            "password" => bcrypt("1234"),
            "tgm_rol_id" => 3,
            "tgm_cliente_id" => 1,
        ]);

        User::updateOrCreate([
            "usu_correo" => "f.acuna01@ufromail.cl",
            "password" => bcrypt("1234"),
            "tgm_rol_id" => 2,
            "tgm_cliente_id" => 2,
        ]);

        User::updateOrCreate([
            "usu_correo" => "m.pinilla03@ufromail.cl",
            "password" => bcrypt("1234"),
            "tgm_rol_id" => 1,
            "tgm_cliente_id" => 3,
        ]);
    }
}
