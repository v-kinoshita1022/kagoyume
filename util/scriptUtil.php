<?php
//共通処理
//topに戻る
if(!isset($_SESSION)){
session_start();
}
require_once('../util/defineUtil.php');
require_once("../common/common.php");//共通ファイル読み込み


function return_top(){//トップページへ移動
    return "<a href='".ROOT_URL."'>トップページへ戻る</a>";
}

function return_seach(){//商品検索へ移動
    return "<a href='".SEARCH."'>買い物を始める</a>";
}

function item(){//使いません
    return "<a href='".ITEM."'>";
}


function cart(){
  $i=0;
  global $appid;
  $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=".$appid."&itemcode=".$_SESSION['goods'][$i++]['code']."&responsegroup=medium";
  $xml = simplexml_load_file($url);
  if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。

       $hit = $xml->Result->Hit;
     }
}

function bind_p2s($name){//存在チェック＆代入
if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
  }


  /**
   * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
   * @param type $name formのname属性
   * @return type セッションに入力されていた値
   */
  function form_value($name){
      if(isset($_POST['push']) && $_POST['push']=='REINPUT'){
          if(isset($_SESSION[$name])){
              return $_SESSION[$name];
          }
      }
  }
