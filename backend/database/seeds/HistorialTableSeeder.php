<?php

use Illuminate\Database\Seeder;
use App\Historial;

class HistorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Historial::insert(
            [
                "peso" => "70 Kg.",
                "imc" => "20",
                "estado_rutina_id" => 1,
            ],
            [
                "peso" => "80 Kg.",
                "imc" => "15",
                "estado_rutina_id" => 1,
            ]
        );
    }
}
