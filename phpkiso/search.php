<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>PHP基礎</title>
  </head>
  <body>
<?php
    $code=$_POST['code'];
    $dsn='mysql:dbname=phpkiso;host=localhost';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES UTF-8');
    $sql='select*from questionnaire where code=?';
    $data[]=$code;
    $stmt=$dbh->prepare($sql);
    $stmt->execute($data);
    while(1){
      $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false){
        break;
      }
      echo $rec['code'];
      echo $rec['nickname'];
      echo $rec['email'];
      echo $rec['message'];
      echo '<br />';
    }
    $dbh= null;

 ?>
 <a href="search.html">検索へ戻る</a><br />
  </body>
</html>
