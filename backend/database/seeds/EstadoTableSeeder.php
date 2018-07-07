<?php

use Illuminate\Database\Seeder;
use App\EstadoRutina;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoRutina::updateOrCreate([
            'tgm_cliente_id' => 1,
            'tgm_rutina_id' => 1,
            'estado' => false
        ]);

        EstadoRutina::updateOrCreate([
            'tgm_cliente_id' => 2,
            'tgm_rutina_id' => 2,
            'estado' => false
        ]);

        EstadoRutina::updateOrCreate([
            'tgm_cliente_id' => 3,
            'tgm_rutina_id' => 1,
            'estado' => true
        ]);
    }
}
