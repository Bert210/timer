<?php

use App\Status;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            "id" => 1,
            "name" => "Queued"
        ]);

        Status::create([
            "id" => 2,
            "name" => "Processing"
        ]);

        Status::create([
            "id" => 3,
            "name" => "Completed"
        ]);
    }
}
