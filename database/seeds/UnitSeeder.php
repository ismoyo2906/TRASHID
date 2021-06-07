<?php

use App\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'unit_name' => 'kilogram'
        ]);

        Unit::create([
            'unit_name' => 'MiliGram'
        ]);

        Unit::create([
            'unit_name' => 'Pcs'
        ]);

        Unit::create([
            'unit_name' => 'Liter'
        ]);
    }
}
