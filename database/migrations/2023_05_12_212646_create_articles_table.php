<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',800);
            $table->string('alias',500)->unique();;
            $table->text('desc');
            $table->integer('image_id')->nullable();
            $table->text('meta_key');
            $table->text('meta_title');
            $table->text('meta_desc');
            $table->integer('type_id');
            $table->foreign('type_id')
              ->references('id')
              ->on('article_types')
              ->onCascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
