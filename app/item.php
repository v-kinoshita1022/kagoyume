<?php
session_start();
require_once("../util/scriptUtil.php");
require_once("../common/common.php");//共通ファイル読み込み
//require_once("../app/search.php");//共通ファイル読み込み
//global $hits;
//foreach ($hits as $hit) {

//echo h($hit->Url);}
//if(!empty($_POST['log'])){//ログインしているなら
//echo 'ログイン';
//}
//}
if(!empty($_GET["Code"])){
  $Code = $_GET["Code"];

  $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$Code&responsegroup=medium";
  $xml = simplexml_load_file($url);
  if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
    $hits = $xml->Result->Hit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>商品ページ</title>
</head>
<body>
  <div id="header">
    <a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a>
  </div>

  <?php foreach ($hits as $hit) { ?>
    <div class="Item">

      <h2><a href="<?php echo ITEM; ?>?Code=<?php echo $Code = h($hit->Code); $Code?>"><?php echo h($hit->Name);
      $Name = h($hit->Name);?></a></h2>
      <img src="<?php echo h($hit->Image->Medium); $img = h($hit->Image->Medium);?>" />
      <h2><?php echo h($hit->Price).'円';   $Price = h($hit->Price)?></h2>
      <?php echo h($hit->Description); ?>
    </p>
  </div>
</form>
<?php } var_dump($Price);var_dump($img);?>

<form action="add.php" method="post">
  <select name="into_cart" >
    <option value=1 selected=1>1</option><!--個数-->
    <?php for($i=2; $i<=30; $i++){?><option value="<?php echo $i ?>" ><?php echo $i ?> </option><?php } ?>
    <input type="hidden" name="Price" value="<?php echo $Price;?>"><!-- 値段 -->
    <input type="hidden" name="img" value="<?php echo $img;?>"><!-- 画像 -->
    <input type="hidden" name="code" value="<?php echo $Code;?>"><!--code -->
    <input type="hidden" name="Name" value="<?php echo $Name;?>"><!-- 商品名 -->


    <input type="submit" name="into" value="カートに追加する">

  </form>
  <div>
    <a href="#header">トップへ戻る</a>
  </div>
</body>
</html>
