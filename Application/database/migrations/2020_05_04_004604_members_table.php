<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tableの作成
        Schema::create('members', function (Blueprint $table) {
            $table->increments('member_id'); //口コミのid(auto)
            $table->string('name', 50); //名前
            $table->string('e-mail', 50); //メールアドレス
            $table->integer('student_number', 6); //学籍番号
            $table->string('password', 30); //パスワード
            $table->string('img_name', 200)->nullable(); //画像ファイルのファイル名
            $table->string('img_path', 40)->nullable(); //画像ファイルのパス名
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
        Schema::drop('members');
    }
}
