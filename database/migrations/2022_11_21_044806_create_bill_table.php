<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->text('bill_number')->nullable();
            $table->text('pricetotal')->nullable();
            $table->text('token')->nullable();
            $table->string('discount_all_order')->nullable();
            $table->string('pricediscount')->nullable();
            $table->string('type_pay')->nullable();
            $table->string('get_paid')->nullable();
            $table->string('accept_change')->nullable();
            $table->string('qty')->nullable();
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
        Schema::dropIfExists('bill');
    }
}
