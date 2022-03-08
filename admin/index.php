
<style>
  .container {
    display: flex;
  }
  aside {
    width: 25%;
  }
  main {
    width: 75%;
  }

</style>

<?php require '../header.php';?>
<?php require 'connect.php';?>
<div class="container">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>
<h2>商品名を入力してください。</h2>
<form action="search-output.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
</main>  
</div>
  
    
<?php require '../footer.php';?>
