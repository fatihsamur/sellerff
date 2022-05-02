<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItems extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_items', function (Blueprint $table) {
      $table->id();
      $table->mediumText('product_name')->nullable();
      $table->mediumText('product_image')->nullable();
      $table->string('unique_identifier');
      $table->string('fnsku')->nullable();
      $table->unsignedBigInteger('service_marketplace_id')->nullable();
      $table->unsignedBigInteger('order_id')->nullable();
      $table->unsignedBigInteger('box_id')->nullable();
      $table->string('customer_note')->nullable();
      $table->unsignedBigInteger('quantity');
      $table->decimal('buying_price');
      $table->decimal('width');
      $table->decimal('height');
      $table->decimal('length');
      $table->decimal('weight');
      $table->string('label')->nullable();
      $table->string('buyer_order_id')->nullable();
      $table->timestamps();

      $table->foreign('service_marketplace_id')->references('id')->on('service_marketplaces')->onDelete('cascade');
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
      $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('order_items');
  }
}
