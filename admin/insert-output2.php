<?php require '../header.php';?>
<?php
  $dbname = "ok_shop"; 
  $host = 'localhost';
  $user = 'ooyama_kyouka';
  $psw =  'Asdf3333-';
  $mydb = 'mysql:dbname='.$dbname.';host='.$host.';charset=utf8';
  
	try{
    $pdo=new PDO($mydb,$user,$psw ); //DBへ接続
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // PDOのエラーモードを追加してください
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 構文チェックと実行を分離したままにする 必須
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // メモリ効率がいい

  } catch (PDOException $e) {
   die('ConneCt Error: ' .$e->getCode()); //DB接続エラー時の処理
  }

  $sql=$pdo->prepare('insert into product values(null, ?, ?)');
  if (empty($_REQUEST['name'])){
    echo '商品名を入力してください。';
  }else
    if(!preg_match('/[0-9]+/', $_REQUEST['price'])){
      echo '商品価格を整数で入力してください。';
    } else 
if ($sql->execute(
  [htmlspecialchars($_REQUEST['name']),$_REQUEST['price']]
  )){
    echo '追加に成功しました。';
  }else{
    echo '追加に失敗しました。';
  }
  ?>
<?php require '../footer.php';?>
