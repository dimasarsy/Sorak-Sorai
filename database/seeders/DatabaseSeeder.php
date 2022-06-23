<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            categoriesSeeder::class,
            RoleSeeder::class,
            ScheduleSeeder::class,
            FilterSeeder::class,
        ]);
    }

}
