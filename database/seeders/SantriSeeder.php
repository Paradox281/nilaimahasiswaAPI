<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SantriModel::factory(10)->create();
    }
}
