<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>PHP基礎</title>
  </head>
  <body>
    <?php
    try{
      $dsn='mysql:dbname=phpkiso;host=localhost';
      $user='root';
      $password='';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->query('SET NAMES UTF-8');
      $nickname = htmlspecialchars($_POST['nickname']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);
      echo $nickname."様<br />";
      echo "ご利用ありがとうございました<br />";
      echo "メッセージ:<br />";
      echo $message."<br />";
      echo $email."にメールを送りましたのでご確認ください。";
      $mail_sub='アンケートを受け付けました。';
      $mail_body=$nickname."様へ\nアンケートご協力ありがとうございました。";
      $mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
      $mail_head='From:xxx@xxx.co.jp';
      mb_language('Japanese');
      mb_internal_encoding('UTF-8');
      mb_send_mail($email,$mail_sub,$mail_body,$mail_head);
      $sql='insert into questionnaire (nickname,email,message)
            values ("'.$nickname.'","'.$email.'","'.$message.'")';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      $dbh= null;
    }catch(Exception $e){
      echo 'ネットワークエラーです。';
    }

     ?>
  </body>
</html>
