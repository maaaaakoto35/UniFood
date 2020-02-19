<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //tableの作成
         Schema::create('post', function (Blueprint $table) {
            $table->increments('id'); //口コミのid(auto)
            $table->string('title', 20); //タイトル
            $table->string('content', 200); //本文
            $table->string('file_name', 40); //画像ファイルのファイル名
            $table->string('store'); //食堂
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
        Schema::drop('post');
    }
}
