<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_payment_method_id');                       
            $table->unsignedBigInteger('service_discount_id');
            $table->decimal('amount', 10, 2);                        
            $table->string('status');            
            $table->timestamps();
            

            $table->foreign('service_payment_method_id')->references('id')->on('service_payment_methods')->onDelete('cascade');            
            $table->foreign('service_discount_id')->references('id')->on('service_discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_payments');
    }
}
