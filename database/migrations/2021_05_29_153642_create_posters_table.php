<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('fcategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('scategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->boolean('temper')->nullable();
            $table->text('description')->nullable();
            $table->string('stitle')->nullable();
            $table->string('image')->nullable();
            $table->string('simage')->nullable();
            $table->string('price')->nullable();
            $table->string('sprice')->nullable();

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
        Schema::dropIfExists('posters');
    }
}
