<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('slug', 50);
            $table->longText('content')->nullable();
            $table->string('meta_title', 155)->nullable();
            $table->string('header', 254)->nullable();
            $table->string('meta_description', 254)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('indexing', 50)->nullable();
            $table->string('canonical', 254)->nullable();
            $table->string('image_alt', 254)->nullable();
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
        Schema::dropIfExists('pages');
    }
}
