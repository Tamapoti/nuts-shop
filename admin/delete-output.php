<?php require '../header.php';?>
<?php require 'connect.php'; 

$sql = $pdo->prepare( 
	"SELECT count(*)
	FROM `favorite`
	WHERE `product_id` = ?"
);

$sql->execute( [$_REQUEST['id']] ) ;
$count1 = $sql->fetch();


$sql = $pdo->prepare( 
	"SELECT count(*)
	FROM `purchase_detail`
	WHERE `product_id` = ?"
);

$sql->execute( [$_REQUEST['id']] ) ;
$count2 = $sql->fetch();
?>

<div class="container">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>

<?php
if( !empty($count1["count(*)"]) || !empty($count2["count(*)"])){
	echo"あるので消せない";
}else{

	$sql=$pdo->prepare('delete from product where id=?');
	if ($sql->execute([$_REQUEST['id']])) {
		echo '削除に成功しました。';
	} else {
		echo '削除に失敗しました。';
	}
}	


?>
</main>
</div>

<?php require '../footer.php'; ?>
