<?php
include './componets/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("location:login.php");
  exit;
}


//adding products in wishlist

if (isset($_POST['add_to_wishlist'])) {
  $id = unique_id();
  $product_id = $_POST['product_id'];
  $varify_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ? " );
  $varify_wishlist->execute([$user_id, $product_id]);

  $cart_num = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ? ");
  $cart_num->execute([$user_id, $product_id]);

  if ($varify_wishlist->rowcount() > 0) {
    $warning_msg[] = 'product is already in your wishlist';
  } else if ($cart_num->rowcount() > 0) {
    $warning_msg[] = 'product is already in your cart';
  } else {
    $select_price = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
    $select_price->execute([$product_id]);
    $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

    // $insert_wishlist = $conn->prepare("INSERT INTO wishlist(id,user_id,product_id,price) VALUES(?,?,?,?)");
    // $insert_wishlist->execute([$id, $user_id, $product_id, $fetch_price['price']]);

    $insert_wishlist = $conn->prepare("INSERT INTO wishlist(user_id,product_id,price) VALUES(?,?,?)");
    $insert_wishlist->execute([ $user_id, $product_id, $fetch_price['price']]);
    $succsss_msg[] = 'product added to wishlist';
  }
}

//adding products in cart

if (isset($_POST['add_to_cart'])) {
  $id = unique_id();
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];
  $qty = filter_var($qty, FILTER_SANITIZE_STRING);
  $varify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ? ");
  $varify_cart->execute([$user_id, $product_id]);
  $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
  $max_cart_items->execute([$user_id]);
  if ($varify_cart->rowcount() > 0) {
    $warning_msg[] = 'product is already in your CART';
  } else if ($max_cart_items->rowcount() > 20) {
    $warning_msg[] = 'cart is full';
  } else {
    $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
    $select_price->execute([$product_id]);
    $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

    // $insert_cart = $conn->prepare("INSERT INTO `cart`(id,user_id,product_id,price,qty) VALUES(?,?,?,?,?)");
    // $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);
    $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id,product_id,price,qty) VALUES(?,?,?,?)");
    $insert_cart->execute([$user_id, $product_id, $fetch_price['price'], $qty]);
    $succsss_msg[] = 'product added to cart';
  }
}

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

    <section class="products">
      <div class="box-container">
        <?php
        $select_product = $conn->prepare("SELECT * FROM products");
        $select_product->execute();
        ?>
        <?php
        $select_product = $conn->prepare("SELECT * FROM products");
        $select_product->execute();
        if ($select_product->rowcount() > 0) {
          while ($fetch_products = $select_product->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <form action="" method="post" class="box">
              <img src="image/<?= $fetch_products['image']; ?>" class="img">
              <div class="button">
                <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                <button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
                <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?> " class="bx bx-show"></a>
              </div>
              <h3 class="name"><?= $fetch_products['name']; ?></h3>
              <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
              <div class="flex">
                <p class="price">price <?= $fetch_products['price']; ?>/-</p>
                <input type="number" name="qty" min="1" max="99" value="1" require maxlength="2" class="qty">
              </div>
              <a href="checkout.php?get_id=<?= $fetch_products['id']; ?> " class="btn">buy now</a>

            </form>
        <?php
          }
        } else {
          echo '<p class ="empty">no products added yet !</p>';
        }
        ?>
      </div>
    </section>

    <?php include 'componets/footer.php'; ?>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>

</html>