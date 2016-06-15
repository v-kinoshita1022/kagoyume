<?php
require_once("../util/defineUtil.php");
session_start();
$quantity = $_POST["quantity"]?$_POST["quantity"]:null;//カゴに追加したままの商品個数
$session_price = $_POST["session_price"]?$_POST["session_price"]:null ;//カゴに追加したままの商品小計
$Price = $_POST["Price"]?$_POST["Price"]:0;//item.phpから値段を受け取る
$into_cart = $_POST["into_cart"]?$_POST["into_cart"]:0;//item.phpでカートに追加した数
$Name = $_POST["Name"]?$_POST["Name"]:null;//商品名を取得
$img = $_POST["img"]?$_POST["img"]:null;//商品画像を取得
$Code = $_POST["code"]?$_POST["code"]:null;//商品画像を
$subtotal = $into_cart*$Price;//カートに追加した商品の小計
setcookie($_SESSION['userID'],$Name.'_'.$subtotal);//追加した商品をIDと紐付けして保存

//var_dump($img);;var_dump($into_cart);var_dump($Price);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>商品追加確認ページ</title>
</head>
<body>
  <div>
    <a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a>
  </div>
  <?php
  if(!empty($_POST["into_cart"])){
    $into_cart= $_POST["into_cart"];
    echo 'カートに商品を追加しました。';
    echo $into_cart*$Price.'円<br>';
  }

  //$_SESSION[""]=$into_cart;//カートに入れた個数を記憶する
  //$_SESSION["session_price"]=$subtotal;//今回カゴに入れた小計を記憶する

  //$_SESSION["img"]=$img;//商品画像を取得
  //var_dump($img);
  if (empty($_SESSION['goods'])) {
    $_SESSION['goods'] = array();
  }
  $array = array(//商品情報を配列に
    'Name' => $Name,
    'code' => $Code,
    'into_cart' => $into_cart,
    'subtotal' => $subtotal
  );
  array_push($_SESSION['goods'], $array);
var_dump($_SESSION['goods']);
  //$_SESSION['goods']=$array;//商品情報を保存
  //var_dump($_SESSION['goods']);

  //カートの小計
  echo '商品'.($quantity + $into_cart).'点 '.($session_price + $subtotal).'円';
  ?>
  <form action="cart.php" >
    <input type="submit" name="cart" value="カート"><!-- 値段 -->

  </form>



</body>
</html>
