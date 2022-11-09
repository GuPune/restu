<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_res', function (Blueprint $table) {
            $table->id();
            $table->text('code')->nullable();
            $table->text('name_list')->nullable();
            $table->text('images')->nullable();
            $table->text('name_list')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('type_of_food_id')->nullable();
            $table->integer('price_sell')->nullable();
            $table->integer('unit_cost')->nullable();
            $table->string('status')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('product_res');
    }
}
