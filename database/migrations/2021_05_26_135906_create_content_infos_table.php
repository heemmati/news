<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_cat_id')->references('id')->on('content_cats')->onDelete('cascade');
            $table->foreignId('order_item_id')->references('id')->on('order_items')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('site_name')->nullable();
            $table->string('month_name')->nullable();
            $table->timestamp('downloaded')->nullable();
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
        Schema::dropIfExists('content_infos');
    }
}
