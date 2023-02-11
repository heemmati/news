<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regionables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->integer('regionable_id');
            $table->string('regionable_type');

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regionables');
    }
}
