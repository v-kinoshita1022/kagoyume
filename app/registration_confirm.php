<?php
//登録内容確認画面
//DBアクセスもここで
require_once("../util/dbaccess.php");//共通ファイル読み込み
require_once("../util/scriptUtil.php");
require_once("../util/defineUtil.php");



 if(!$_POST['push']=="CONFIRM"){
     echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
     echo return_top();
 }



     //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
     $confirm_values = array(
                             'name' => bind_p2s('name'),
                             'password' => bind_p2s('password'),
                             'mail' =>bind_p2s('mail'),
                             'address' =>bind_p2s('address'));

     //1つでも未入力項目があったら表示しない
     if(!in_array(null,$confirm_values, true)){
         ?>
         <h1>登録確認画面</h1><br>
         名前:<?php echo $confirm_values['name'];?><br>
         パスワード:<?php echo $confirm_values['password'];?><br>
         メールアドレス:<?php echo($confirm_values['mail']);?><br>
         住所:<?php echo $confirm_values['address'];?><br>


         上記の内容で登録します。よろしいですか？

         <form action="<?php echo REGISTRATION_COMPLETE ?>" method="POST">
             <input type="hidden" name="mode" value="RESULT" >
             <input type="submit" name="yes" value="はい">
         </form>
         <?php
     }else {
         ?>
         <h1>入力項目が不完全です</h1><br>
         再度入力を行ってください<br>
         <h3>不完全な項目</h3>
         <?php
         //連想配列内の未入力項目を検出して表示
         foreach ($confirm_values as $key => $value){
             if($value == null){
                 if($key == 'name'){
                     echo '名前';
                 }

                 if($key == 'password'){
                     echo 'パスワード';
                 }
                 if($key == 'mail'){
                     echo 'メールアドレス';
                 }
                 if($key == 'address'){
                     echo '住所';
                 }
                 echo 'が未記入です<br>';
             }
         }
     }
     ?>
     <form action="<?php echo REGISTRATION ?>" method="POST">
         <input type="hidden" name="push" value="REINPUT" >
         <input type="submit" name="no" value="登録画面に戻る">
     </form>
     <?php


 ?>
</body>
</html>
