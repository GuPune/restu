<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_config', function (Blueprint $table) {
            $table->id();
            $table->text('cg_name')->nullable();
            $table->text('cg_value')->nullable();
            $table->text('image_shotcut')->nullable();
            $table->text('image_logo')->nullable();
            $table->text('image_fut')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('images_config');
    }
}
