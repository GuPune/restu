<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new', function (Blueprint $table) {
            $table->id();
            $table->text('title_th')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_ch')->nullable();
            $table->text('detail_th')->nullable();
            $table->text('detail_en')->nullable();
            $table->text('detail_ch')->nullable();
            $table->text('url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('name_ch')->nullable();
            $table->text('name_th')->nullable();
            $table->text('name_en')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('new');
    }
}
