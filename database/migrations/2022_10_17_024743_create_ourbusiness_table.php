<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurbusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourbusiness', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('des')->nullable();
            $table->text('url')->nullable();
            $table->text('keywords')->nullable();
            $table->string('status')->nullable();
            $table->integer('view')->nullable();
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
        Schema::dropIfExists('ourbusiness');
    }
}
