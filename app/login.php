<?php
require_once("../util/dbaccess.php");//共通ファイル読み込み
session_start();
$name= $_POST["name"]?$_POST['name']:null;
$password= $_POST["password"]?$_POST['password']:null;
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
</head>
<body>
<div id="header">
<a href="<?php echo ROOT_URL ?>"><h1>かごゆめ</h1></a></div>

  <form action="login.php" method="post">
   ユーザーネーム<input type="text" name="name" value="<?php echo $name; ?>">
   パスワード<input type="text" name="password" value="<?php echo $password; ?>">
   <br><br>

   <?php if(!empty($name && $password)){//ユーザー名とパスが入力されているならDBでand検索

      login($name,$password);
          if(!empty($seach_query)){//検索結果がtrueならユーザー名とIDをセッションに保存
              $_SESSION['name'] = $seach_query['name'];
              $_SESSION['userID'] = $seach_query['userID'];
          }else{
            echo '入力が正しくありません';
          }
      }?>

   <input type="submit" value="ログイン">
  </form>
   <br><br>

  <form action="registration.php" method="post">
    <input type="hidden" name="push" value="registration">
   <input type="submit" name="registration"value="新規登録">
  </form>


</body>
</html>
