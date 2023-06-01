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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',800);
            $table->string('alias',500)->unique();
            $table->text('desc');
            $table->integer('image_id')->nullable();
            $table->text('meta_key')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->unique();

//            $table->foreign('category_id')
//                ->references('id')
//                ->on('categories')
//                ->onCascade('delete')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
