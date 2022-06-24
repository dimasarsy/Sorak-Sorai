<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string('slug', 512)->unique();
            $table->text('description');
            $table->text('body');
            $table->foreignId("user_id");
            $table->foreignId('categories_id');
            $table->string('image');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('shopeelink');
            $table->timestamp("published_at")->nullable();
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
        Schema::dropIfExists('posts');
    }
}
