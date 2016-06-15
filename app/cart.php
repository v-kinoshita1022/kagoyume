<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../common/common.php");//共通ファイル読み込み
require_once("../util/scriptUtil.php");

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
 <title>カート</title>
 </head>
 <body>
 <div>
    <a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a>
 </div>
 <?php




//var_dump($_SESSION['goods']);
$i=0;
    foreach ($_SESSION['goods'] as $value){
         //cart();

         global $appid;
         $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=".$appid."&itemcode=".$_SESSION['goods'][$i++]['code']."&responsegroup=medium";
         $xml = simplexml_load_file($url);
         if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。

              $hit = $xml->Result->Hit;
            //if($Name == null){
              //continue;
            //}else{
            ?><a href="<?php echo ITEM; ?>?Code=<?php echo $value['Code']; ?>"><?php echo h($hit->Name); ?></a><br>
              <img src="<?php  echo  h($hit->Image->Medium);?>"></img><br>
            <?php  echo $value['into_cart'].'点  '.$value['subtotal'].'円<br>';

           //setcookie('Name',h($hit->Name));
           //setcookie('subtotal',$value['subtotal']);
          }

 }
 ?>
 <form action="buy_confirm.php" >
   <input type="submit" name="buy" value="レジに進む"><!-- 値段 -->

 </form>



</body>
</html>
