<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert(
            [
                [
                    "name" => "Konser Maya Raya",
                    "price" => 15000,
                    "description" => "Ayo ikut kegiatan manasik bersama saya rini",
                    "image" => "87Keyboard1.jpg",
                    "date" => "2023-12-27",
                    "starttime" => "14:00",
                    "endtime" => "17:00",
                    "availableScheduleDate" => "2023-12-27 14:00:00",
                    "dueDateSchedule" => "2023-12-27 17:00:00",
                    "status" => "available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 2,
                    "author" => "Rini Kuskis",
                ],
                [
                    "name" => "Festival Kembang Api",
                    "price" => 200000,
                    "description" => "Ayo ikut kegiatan manasik bersama saya rita",
                    "image" => "87Keyboard2.jpg",
                    "date" => "2023-12-11",
                    "starttime" => "13:00",
                    "endtime" => "15:00",
                    "availableScheduleDate" => "2023-12-11 13:00:00",
                    "dueDateSchedule" => "2023-12-11 15:00:00",
                    "status" => "available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 3,
                    "author" => "Rita Ruminin",
                ],
                [
                    "name" => "Festival Maya",
                    "price" => 15000,
                    "description" => "Ayo ikut kegiatan tahap selanjutnya manasik bersama saya rini",
                    "image" => "87Keyboard3.jpg",
                    "date" => "2023-12-19",
                    "starttime" => "11:00",
                    "endtime" => "16:00",
                    "availableScheduleDate" => "2023-12-19 11:00:00",
                    "dueDateSchedule" => "2023-12-19 16:00:00",
                    "status" => "available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 2,
                    "author" => "Rini Kuskis",
                ],

            ]
        );
    }
}
