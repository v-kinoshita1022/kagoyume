<?php
//新規登録画面
require_once("../util/scriptUtil.php");
session_start();//再入力用
$registration = $_POST["push"]?$_POST["push"]:null;
var_dump($registration);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <title>新規登録</title>
 </head>
 <body>
   <div>
     <a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a>
   </div>
   <?php if(empty($registration)){//新規登録ボタンが押されていなければ
     echo 'アクセスルートが不正です。<br>';
     echo return_top();
   }else{ ?>

   <form action="registration_confirm.php" method="post">
     名前:<input type="text" name="name" value="<?php echo form_value('name');?>"><br><!--確認ページから戻ってきた時は入力済み -->
     パスワード:<input type="text" name="password" value="<?php echo form_value('password'); ?>"><br>
     メールアドレス:<input type="text" name="mail" value="<?php echo form_value('mail');?>"><br>
     住所<input type="text" name="address" value="<?php echo form_value('address'); ?>"> <br>
     <input type="hidden" name="push" value="CONFIR">
     <input type="submit" name="confirm" value="登録内容を確認">
   </form>
 <?php }?>
</body>
</html>
