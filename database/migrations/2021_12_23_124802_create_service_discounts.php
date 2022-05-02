<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_discounts', function (Blueprint $table) {
            $table->id();
            $table->decimal('discount_rate', 10, 2);   
            $table->decimal('minimum_order_value', 10, 2)->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->string('discount_type');
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
        Schema::dropIfExists('service_discounts');
    }
}
