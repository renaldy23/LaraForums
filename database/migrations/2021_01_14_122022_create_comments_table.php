<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("body");
            $table->bigInteger("users_id")->unsigned();
            $table->foreign("users_id")->references("id")->on("users");
            $table->bigInteger("questions_id")->unsigned();
            $table->foreign("questions_id")->references("id")->on("questions")->onDelete("cascade");
            $table->string("image");
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
        Schema::dropIfExists('comments');
    }
}
