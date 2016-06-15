<?php
//決済確認
//戻る、買い物を続ける
session_start();
$cookie = $_COOKIE[$_SESSION['userID']];
$cart_array = explode('_',$cookie );
var_dump($cart_array);
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
    <?php foreach ($cookie as $cookie_array ) {
           foreach ($cookie_array as $key => $value) {
             echo $value.' '.$value.'円';
           }
      # code...
    }?>

  </div>
</body>
</html>
