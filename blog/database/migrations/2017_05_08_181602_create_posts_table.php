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
        //
        //blog table
        Schema::create('posts' ,function(Blueprint $table)
        {
          $table->increments('id');
          $table->integer('author_id')->unsigned->default(0);
          $table->foriegn('author_id')->references('id') ->on('users')->onDelete('cascade');
          $table->string ('title')->unique();
          $table->text('body');
          $table->string('slug')->unique();
          $table->boolean('active');
          $table->timestamp();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //drop table
        Schema::drop('posts');
    }
}
