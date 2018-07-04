<?php

use Illuminate\Database\Seeder;

use App\Rutina;

class RutinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rutina::updateOrCreate([
        	"nombre" => "Brazos",
            "descripcion" => "Levantamiento de pesas de mano",
        ]);

        Rutina::updateOrCreate([
        	"nombre" => "Piernas",
            "descripcion" => "Ejercicios con prensa",
        ]);

        Rutina::updateOrCreate([
        	"nombre" => "Abdomen",
            "descripcion" => "Ejercicios con ejercitador abdominal",
        ]);
    }
}
