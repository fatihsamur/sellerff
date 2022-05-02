<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('box_label')->nullable();
            $table->string('width_in')->nullable();
            $table->string('height_in')->nullable();
            $table->string('length_in')->nullable();
            $table->string('weight_lbs')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}
