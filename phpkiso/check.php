<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>PHP基礎</title>
  </head>
  <body>
    <?php
      $nickname = htmlspecialchars($_POST['nickname']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);
      if($nickname == ""){
        echo "名前が入力されていません<br />";
      }else{
        echo "こんにちは";
        echo $nickname."様<br />";
      }
      if($email == ""){
        echo "メールアドレスが入力されていません<br />";
      }else{
        echo "メールアドレス：";
        echo $email."<br />";
      }
      if($message == ""){
        echo "感想が入力されていません<br />";
      }else{
        echo "感想：";
        echo $message."<br />";
      }
      if($nickname == "" || $email == "" || $message == ""){
        echo '<input type="button" onclick="history.back()" value="戻る">';
      }else{
        echo '<form method="post" action="thanx.php">';
        echo '<input name="nickname" type="hidden" value="'.$nickname.'">';
        echo '<input name="email" type="hidden" value="'.$email.'">';
        echo '<input name="message" type="hidden" value="'.$message.'">';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '<input type="submit" value="OK">';
        echo '</form>';
      }
    ?>

  </body>
</html>
