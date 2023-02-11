<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_id')->references('id')->on('socials')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->string('socialable_type')->nullable();
            $table->integer('socialable_id')->nullable();
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
        Schema::dropIfExists('socialables');
    }
}
