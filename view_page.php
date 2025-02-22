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
  $varify_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ? ");
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
    $insert_wishlist->execute([$user_id, $product_id, $fetch_price['price']]);
    $succsss_msg[] = 'product added to wishlist';
  }
}

//adding products in cart

if (isset($_POST['add_to_cart'])) {
  $id = unique_id();
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];
  $qty = filter_var($qty, FILTER_SANITIZE_STRING);
  $varify_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ? ");
  $varify_cart->execute([$user_id, $product_id]);
  $max_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
  $max_cart_items->execute([$user_id]);
  if ($varify_cart->rowcount() > 0) {
    $warning_msg[] = 'product is already in your wishlist';
  } else if ($max_cart_items->rowcount() > 20) {
    $warning_msg[] = 'cart is full';
  } else {
    $select_price = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
    $select_price->execute([$product_id]);
    $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

    // $insert_cart = $conn->prepare("INSERT INTO cart(id,user_id,product_id,price,qty) VALUES(?,?,?,?,?)");
    // $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);
    $insert_cart = $conn->prepare("INSERT INTO cart(user_id,product_id,price,qty) VALUES(?,?,?,?)");
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
  <title>Green coffee - product detail page</title>
</head>

<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <div Class="banner">
      <h1>product detail</h1>
    </div>
    <div class="title2">
      <a href="home.php">home</a><span>/product detail</span>
    </div>

    <section class="view_page">
      <?php
      if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $select_product = $conn->prepare("select * from `products` where id = '$pid'");
        $select_product->execute();
        if ($select_product->rowCount() > 0) {
          while ($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)) {

      ?>
            <form action="" method="post">
              <img src="image/<?php echo $fetch_product['image']; ?>" alt="">
              <div class="detail">
                <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                <div class="name"><?php echo $fetch_product['name']; ?></div>
                <div class="detail">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nisi dolorem sequi dignissimos,
                    voluptates enim tempore error a deleniti minima, odio libero harum!
                    Tempore eum odit obcaecati, a aut quasi error.
                  </p>
                </div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                <div class="button">
                  <button type="submit" name="add_to_wishlist" class="btn">add to wishlist <i class="bx bx-heart"></i></button>
                  <input type="hidden" name="qty" value="1" min="0" class="quantity">
                  <button type="submit" name="add_to_cart" class="btn">add to cart <i class="bx bx-cart"></i></button>
                </div>
              </div>
            </form>
      <?php
          }
        }
      }
      ?>
    </section>

    <?php include 'componets/footer.php'; ?>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>

</html>