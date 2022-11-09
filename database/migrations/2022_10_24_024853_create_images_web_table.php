<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_web', function (Blueprint $table) {
            $table->id();
            $table->text('slide_topic')->nullable();
            $table->text('slide_type')->nullable();
            $table->text('slide_detail')->nullable();
            $table->text('slide_path')->nullable();
            $table->text('slide_url')->nullable();
            $table->text('slide_crt')->nullable();
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
        Schema::dropIfExists('images_web');
    }
}
