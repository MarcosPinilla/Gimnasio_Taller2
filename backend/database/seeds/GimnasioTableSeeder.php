<?php

use Illuminate\Database\Seeder;

use App\Gimnasio;

class GimnasioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gimnasio::updateOrCreate([
        	"nombre" => "GymCenter"
        ]);

        Gimnasio::updateOrCreate([
        	"nombre" => "Pacific Fitness"
        ]);
    }
}
