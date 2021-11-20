<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('quantities');
            $table->string('total');


            $table->bigInteger('customer_id')->unsigned();

            $table->string('payment');
            $table->string('delivery');
            $table->string('status');
            $table->timestamps();



            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');


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
