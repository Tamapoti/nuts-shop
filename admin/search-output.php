<?php require '../header.php';?>
<table>
  <tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
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
  
  $sql = $pdo -> prepare ('select * from product where name=?');
  $sql->execute([$_REQUEST['keyword']]);
  foreach ($sql as $row){
    echo '<tr>';
    echo '<td>',$row['id'], '</td>';
    echo '<td>',$row['name'], '</td>';
    echo '<td>',$row['price'], '</td>';
    echo '</tr>';
    echo "\n";
  }
  ?>
  </teble>
  <?php require '../footer.php';?>