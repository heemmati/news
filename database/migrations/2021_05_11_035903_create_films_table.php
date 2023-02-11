<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();

            $table->foreignId('creator_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('head_title')->nullable();
            $table->string('code')->nullable();
            $table->string('screenshot')->nullable();
            $table->string('video')->nullable();
            $table->integer('type')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->softDeletes();


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
        Schema::dropIfExists('films');
    }
}
