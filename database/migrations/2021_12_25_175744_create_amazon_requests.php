<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonRequests extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('amazon_requests', function (Blueprint $table) {
      $table->id();
      $table->decimal('buying_price', 10, 2)->nullable();
      $table->string('request_id');
      $table->string('sku');
      $table->string('weight');
      $table->string('length');
      $table->string('width');
      $table->string('height');
      $table->text('product_image');
      $table->text('product_name');
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
    Schema::dropIfExists('amazon_requests');
  }
}
