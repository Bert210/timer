<?php

use App\Employee;

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            "id" => 1,
            "name" => "John Doe",
            "number" => "124388"
        ]);

        Employee::create([
            "id" => 2,
            "name" => "Jane Doe",
            "number" => "124389"
        ]);

        Employee::create([
            "id" => 3,
            "name" => "Amanda Smith",
            "number" => "402820"
        ]);

        Employee::create([
            "id" => 4,
            "name" => "Ryan Lee",
            "number" => "429901"
        ]);

        Employee::create([
            "id" => 5,
            "name" => "Shane Williams",
            "number" => "492831"
        ]);

    }
}
