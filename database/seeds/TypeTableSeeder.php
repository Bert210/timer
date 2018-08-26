<?php

use App\Type;

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            "id" => 1,
            "name" => "Service Wash"
        ]);
        Type::create([
            "id" => 2,
            "name" => "New Car PDI"
        ]);
        Type::create([
            "id" => 3,
            "name" => "Used Card"
        ]);
        Type::create([
            "id" => 4,
            "name" => "Delivery"
        ]);
    }
}
