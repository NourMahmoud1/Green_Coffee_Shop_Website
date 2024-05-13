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
if (isset($_GET['get_id'])) {
  $get_id = $_GET['get_id'];
} else {
  $get_id = '';
  header('location:order.php');
}
if (isset($_POST['cancle'])) {
  $update_order = $conn->prepare("UPDATE `orders` SET status = ? WHERE id = ?");
  $update_order->execute(['canceled', $get_id]);
  header('location:order.php');
}
// $get_id = isset($_GET['get_id']) ? $_GET['get_id'] : '';
// header('location:order.php');
// exit;

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
  <title>Green coffee - order detail page</title>
</head>

<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <div Class="banner">
      <h1>order detail </h1>
    </div>
    <div class="title2">
      <a href="home.php">home</a><span>/orders</span>
    </div>

    <section class="order-detail">
      <div class="title">
        <img src="img/download.png" class="logo">
        <h1>order-detail</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit aut, iusto voluptate delectus est voluptatibus, doloribus vero pariatur officiis, atque nostrum necessitatibus maxime amet molestias. Quis placeat numquam consequuntur deleniti.</p>
        <div class="box-container">
          <?php
          $grand_total = 0;
          $select_orders = $conn->prepare("SELECT * FROM orders WHERE id = ? LIMIT 1");
          $select_orders->execute([$get_id]);
          if ($select_orders->rowCount() > 0) {
            while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {
              $select_products = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1 ");
              $select_products->execute([$fetch_order['product_id']]);
              if ($select_products->rowCount() > 0) {
                while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                  $sub_total = ($fetch_order['price'] * $fetch_order['qty']);
                  $grand_total += $sub_total;


          ?>
                  <div class="box">
                    <div class="col">
                      <p class="title"><i class="bi bi-calender-fill"> <?= $fetch_order['date']; ?></i></p>
                      <img class="image" src="image/<?= $fetch_product['image']; ?>">
                      <p class="price"><?= $fetch_product['price'] ?> x <?= $fetch_order['qty']; ?></p>
                      <h3 class="name"><?= $fetch_product['name']; ?></h3>
                      <p class="grand_total">total amount payable : <span><?= $grand_total; ?></span></p>
                    </div>
                    <div class="col">
                      <p class="title">billing address</p>
                      <p class="user"><i class="bi bi-person-pounding-box"><?= $fetch_order['name']; ?></i></p>

                      <p class="user"><i class="bi bi-envelope"><?= $fetch_order['email']; ?></i></p>
                      <p class="user"><i class="bi bi-pin-map-fill"><?= $fetch_order['address']; ?></i></p>
                      <p class="title">status</p>
                      <p class="status" style="color:<?php if ($fetch_order['status'] == 'delivered') {
                                                        echo 'green';
                                                      } elseif ($fetch_order['status'] == 'canceled') {
                                                        echo 'red';
                                                      } else {
                                                        echo 'orange';
                                                      } ?>"><?= $fetch_order['status']; ?></p>

                      <?php if ($fetch_order['status'] == 'canceled') { ?>
                        <a href="checkout.php?get_id=<?php $fetch_product['id']; ?>" class="btn">order again</a>
                      <?php   } else { ?>
                        <form method="post">
                          <button type="submit" name="cancle" class="btn" onclick="return confirm('do you want to cancel')">cancle order</button>
                        </form>
                      <?php   }  ?>
                    </div>
                  </div>

          <?php

                }
              } else {
                echo '<p class="empty">product not found </p>';
              }
            }
          } else {
            echo '<p class="empty">no orders found </p>';
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