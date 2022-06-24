<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer("price");
            $table->text("description");
            $table->string("image");
            $table->date('date');
            $table->string('starttime');
            $table->string('endtime');
            $table->string('availableScheduleDate');
            $table->string('dueDateSchedule');
            $table->string('status')->nullable();
            $table->string('notifyStatus')->default('not notified');
            $table->string('emailNotifyStatus')->default('not notified');
            $table->foreignId('user_id');
            $table->string('author');
            $table->boolean('vip')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
