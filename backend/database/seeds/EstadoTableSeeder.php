<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tgm_estado_rutina')->insert([
            'tgm_cliente_id' => 1,
            'tgm_rutina_id' => 1,
            'estado' => false
        ]);
    }
}
