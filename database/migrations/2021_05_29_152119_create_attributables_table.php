<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreignId('attribute_value_id')->references('id')->on('attribute_values')->onDelete('cascade');
            $table->bigInteger('attributable_id');
            $table->string('attributable_type');

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
        Schema::dropIfExists('attributables');
    }
}
