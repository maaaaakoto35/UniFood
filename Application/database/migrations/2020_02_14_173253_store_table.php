<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tableの作成
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id'); //店のid(auto)
            $table->string('store_name'); //店名
            $table->integer('foods'); //品数
            $table->string('place'); //何号館？
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
        Schema::drop('store');
    }
}
