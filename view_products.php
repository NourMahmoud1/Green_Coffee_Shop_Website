
<?php  
  include 'componets/connection.php';
  ?>
<style type="text/css">
  <?php include 'style.css' ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <title>Green coffee - shop page</title>
</head>
<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
  <div Class="banner">
    <h1>shop</h1>
  </div>
  <div class="title2">
    <a href="home.php">home</a><span>/our shop</span>
    </div>
    <section class = "products">
      <div class = "box-container">
        <?php 
          $select_product = $conn->prepare("SELECT * FROM products" ) ;
          $select_product->execute() ;

          if($select_product->rowcount > 0)
           {
            while ($fetch_products = $select_product->fetch(PDO::FETCH_ASSOC)) {
                
            
           
        ?>
        <form  action ="" method = "post" class = "box" >
            <img src="image/<?=$fetch_products['image']; ?>"  class="img">
            <div class = "button">
                <button type="submit" name ="add_to_cart"><i class="bx bx-cart"></i></button>               
                <button type="submit" name ="add_to_wishlist"><i class="bx bx-heart"></i></button>
                <a href="view_products.php?pid=<?php echo $fetch_products['id'] ; ?> " class = "bx bx-show" ></a>
            </div>
                 <h3 class = "name"><?=$fetch_products['name'] ;?></h3>
                <input type="hidden" name="product_id" value="<?=$fetch_products['id'] ; ?>" >
            <div class="files">
                <p class ="price">price <?=$fetch_products['price']; ?>/-</p>
                <input type="number" name="qty" min="1" max ="99" require maxlength="2" class ="qty">
            </div>
            <a href="checkout.php?get_id=<?=$fetch_products['id'] ; ?> " class ="btn">buy now</a>
            
        </form>
        <?php 
            }
        }else {
            echo '<p class ="empty">no products added yet !</p>' ;
        }
        ?>
      </div>
    </section>
    <?php  include 'componets/footer.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>
</html>