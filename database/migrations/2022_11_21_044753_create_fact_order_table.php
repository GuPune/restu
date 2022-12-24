<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_order', function (Blueprint $table) {
            $table->id();
            $table->integer('res_id');
            $table->integer('toe_id');
            $table->integer('bill_id');
            $table->integer('price_sell')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('status')->nullable();
            $table->string('order_number')->nullable();
            $table->string('type_discount')->nullable();
            $table->integer('discount')->nullable();
            $table->text('token')->nullable();
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
        Schema::dropIfExists('fact_order');
    }
}
