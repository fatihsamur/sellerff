<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->decimal('balance', 10, 2)->default(0);
            $table->string('subscription_charge_method')->default('balance');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('line1');
            $table->text('line2');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
