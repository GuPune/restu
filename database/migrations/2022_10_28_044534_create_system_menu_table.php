<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menu', function (Blueprint $table) {
            $table->id();
            $table->text('name_th')->nullable();
            $table->text('name_en')->nullable();
            $table->text('name_ch')->nullable();
            $table->text('title_th')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_cn')->nullable();
            $table->text('link')->nullable();
            $table->text('system_menu')->nullable();
            $table->text('system_encodeid')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('system_menu');
    }
}
