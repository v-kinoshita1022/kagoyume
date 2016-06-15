<?php
//登録結果
//topに戻る or 買い物を続ける or 決済画面へ
require_once("../util/defineUtil.php");//共通ファイル読み込み
require_once("../util/scriptUtil.php");
require_once("../util/dbaccess.php");

$name = $_SESSION['name']?$_SESSION['name']:null;
$password = $_SESSION['password']?$_SESSION['password']:null;
$mail = $_SESSION['mail']?$_SESSION['mail']:null;
$address = $_SESSION['address']?$_SESSION['address']:null;


?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
    <body>
<?php if(!empty($name) && !empty($password) && !empty($mail) && !empty($address)){//全て入力されているならDBにインサート
  
  $result = insert_profiles($name, $password, $mail, $address );
}
var_dump($result);
    if(!isset($result)){
  ?>
  <h1>登録結果画面</h1><br>
  名前:<?php echo $name;?><br>
  パスワード:<?php echo $password;?><br>
  メールアドレス:<?php echo $mail;?><br>
  住所:<?php echo $address;?><br>
  以上の内容で登録しました。<br>
  <?php
  echo return_top().'<br>';
  echo return_seach();
  }else{
      echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:「'.$result.'」';
  }
 ?>
