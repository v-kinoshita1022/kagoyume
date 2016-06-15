<?php
//トップページ
//session_start()
//if(!empty($_POST['name']) && !empty($_POST['pass'])){//名前とパスがセッションに入っていれば入力する
//}
// セッション変数を全て解除する
session_start();


require_once("../util/defineUtil.php");

//$post_name = $_POST["post_name"]?$_POST["post_name"]:null;
//$post_pass= $_POST["post_pass"]? $_POST["post_pass"]:null;
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
 <title>トップページ</title>
 </head>
 <body>
<div>
   <a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a>
</div>
 <form action="search.php" method="post">
   <input type="submit" name="cart" value="商品検索ページへ">
 </form>

<div>
 <form action="login.php" >
   <input type="submit" name="login" value="ログインページへ">
 </foem>
</div>

<div>
   </form>
   <form action="cart.php" >
     <input type="submit" name="cart" value="カート">
   </foem>
</div>

 </body>
 </html>
