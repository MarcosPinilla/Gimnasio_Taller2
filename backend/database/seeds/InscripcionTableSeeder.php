<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscripcionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tgm_inscripcion')->insert([
            'tgm_gimnasio_id' => 1,
            'tgm_cliente_id' => 1,
        ]);
    }
}
