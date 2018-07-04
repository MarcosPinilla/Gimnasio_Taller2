<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClienteTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(GimnasioTableSeeder::class);
        $this->call(RutinaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
