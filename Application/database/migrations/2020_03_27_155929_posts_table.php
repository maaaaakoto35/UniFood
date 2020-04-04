<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tableの作成
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id'); //口コミのid(auto)
            $table->string('title'); //タイトル
            $table->string('store_name'); //店名
            $table->string('store_jname'); //店名(ja)
            $table->string('contents'); //本文
            $table->integer('rate'); //本文
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
        Schema::drop('posts');
    }
}