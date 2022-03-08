

<?php require '../header.php';?>

<div class="container">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>

<table><tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
  <?php
$pdo=new PDO('mysql:host=localhost;dbname=ok_shop;charset=utf8', 'ooyama_kyouka', 'Asdf3333-');
foreach ($pdo -> query('select *from product')as $row) {
  echo '<tr>';
  echo '<td>',$row['id'], '</td>';
  echo '<td>',$row['name'], '</td>';
  echo '<td>',$row['price'], '</td>';
  echo '<td>';
  echo '<a href="delete-output.php?id=',$row['id'],'">削除</a>';
  echo '</td>';
  echo '</tr>';
  echo "\n";
}
?>
</table>

</main>
</div>

<?php require '../footer.php';?>