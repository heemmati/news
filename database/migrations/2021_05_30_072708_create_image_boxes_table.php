<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('src')->nullable();
            $table->BigInteger('image_boxable_id')->nullable();
            $table->BigInteger('image_boxable_type')->nullable();
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
        Schema::dropIfExists('image_boxes');
    }
}
