<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('perex');
            $table->longText('text');
            $table->text('image');
            $table->integer('views')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
