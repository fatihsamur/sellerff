<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('service_country_id')->nullable();
      $table->unsignedBigInteger('service_payment_id')->nullable();
      $table->decimal('order_total', 10, 2)->nullable();
      $table->decimal('order_total_prime', 10, 2)->nullable();
      $table->decimal('order_total_basic', 10, 2)->nullable();
      $table->decimal('total_weight', 10, 2)->nullable();
      $table->decimal('total_quantity', 10, 2)->nullable();
      $table->string('warehouse_address');
      $table->string('status');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('service_country_id')->references('id')->on('service_countries')->onDelete('cascade');
      $table->foreign('service_payment_id')->references('id')->on('service_payments')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}
