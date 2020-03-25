<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PostsController extends Controller
{
    //
    public function add_review(){
    	$post = Post::latest()->get();
    	$option_list = [
    		'年齢'
    	]
    }

    public function post(){

    }
}

<form>
				<textarea name="add_review" class="form-control" placeholder="口コミを記入してください。"></textarea>
				<button type="submit" class="btn btn-default">投稿する</button>
			</form>



if (isset($_POST["title"]) && isset($_POST["contents"])) {
      if (!isset($_POST["password"]) || $_POST["password"] != ) {
        echo "<p>パスワードが違います</p>";
      } else {
        try{
          ini_set("date.timezone", "Asia/Tokyo"); //タイムゾーンの指定
          $time=date("Y.m.d-H:i"); //$timeへ成形した年月日および時刻データを格納

	         $dbh = new PDO('sqlite:','',''); //PDOクラスのオブジェクトの作成
      	  $sql='insert into posts (title, contents, date)
                values (?, ?, ?)'; //実行するSQL文を$sqlに格納
       	  $sth = $dbh->prepare($sql); //prepareメソッドでSQL文の準備

          $sth->execute(array($_POST["title"], $_POST["contents"], $time));
 //prepareした$sthを実行 SQL文の？部に格納する変数を指定
          if ($sth) {
            echo "口コミ１件を投稿しました";
          } else {
            echo "口コミ１件の投稿に失敗しました";
          }

        } Catch (PDOException $e) {
          print "エラー!: " . $e->getMessage() . "<br/>";
	 die();
        }
      }
    }
    $dbh = null;

  ?>