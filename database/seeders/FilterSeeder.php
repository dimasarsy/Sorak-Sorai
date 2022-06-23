<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filters')->insert(
            [
                ["name" => "Title"],
                ["name" => "Price"],
                ["name" => "Lecturer"],
            ]
        );
    }
}
