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
        	"name" => "Daniel Coronado Mendoza",
        	"email" => "d.coronado01@ufromail.cl",
        	"password" => bcrypt("1234"),
        ]);

        User::updateOrCreate([
        	"name" => "Felipe Acuña Figueroa",
        	"email" => "f.acuna01@ufromail.cl",
        	"password" => bcrypt("1234"),
        ]);

        User::updateOrCreate([
        	"name" => "Marcos Pinilla Martinez",
        	"email" => "m.pinilla03@ufromail.cl",
        	"password" => bcrypt("1234"),
        ]);
    }
}
