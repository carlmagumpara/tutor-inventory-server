<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create(['name' => 'Pieces']);
        Unit::create(['name' => 'Bottles']);
        Unit::create(['name' => 'Boxes']);
    }
}
