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
  <title>Green coffee - about us page</title>
</head>

<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <div Class="banner">
      <h1>about us</h1>
    </div>
    <div class="title2">
      <a href="home.php">home</a><span>/about</span>
    </div>
    <div class="about-category">
      <div class="box">
        <img src="img/3.webp">
        <div class="detail">
          <span>coffee</span>
          <h1>lemon green</h1>
          <a href="view_product.php" class="btn">shop now</a>
        </div>
      </div>
      <div class="box">
        <img src="img/about.png">
        <div class="detail">
          <span>coffee</span>
          <h1>lemon teaname</h1>
          <a href="view_product.php" class="btn">shop now</a>
        </div>
      </div>
      <div class="box">
        <img src="img/2.webp">
        <div class="detail">
          <span>coffee</span>
          <h1>lemon teaname</h1>
          <a href="view_product.php" class="btn">shop now</a>
        </div>
      </div>
      <div class="box">
        <img src="img/1.webp">
        <div class="detail">
          <span>coffee</span>
          <h1>lemon green</h1>
          <a href="view_product.php" class="btn">shop now</a>
        </div>
      </div>
    </div>
    <section class="services">
      <div class="title">
        <img src="./img/download.png" class="logo">
        <h1>why choose us</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, debitis accusamus maxime at, maiores dolores, vero odit aspernatur quos alias impedit assumenda delectus nisi suscipit quae. Beatae nihil iure fuga.

        </p>
      </div>
      <div class="box-container">
        <div class="box">
          <img src="./img/icon2.png" alt="" srcset=" ">
          <div class="detail">
            <h1>great savings</h1>
            <p>save big every order</p>
          </div>
        </div>
        <div class="box">
          <img src="./img/icon1.png" alt="" srcset=" ">
          <div class="detail">
            <h1>24*7 support</h1>
            <p>one-on-one support</p>
          </div>
        </div>
        <div class="box">
          <img src="./img/icon0.png" alt="" srcset=" ">
          <div class="detail">
            <h3>gift vouchers</h3>
            <p>vouchers on every festivals</p>
          </div>
        </div>
        <div class="box">
          <img src="./img/icon.png" alt="" srcset=" ">
          <div class="detail">
            <h1>worldwide delivery</h1>
            <p>dropship worldwide</p>
          </div>
        </div>
      </div>
    </section>
    <div class="about">
      <div class="row">
        <div class="img-box">
          <img src="img/3.png">
        </div>
        <div class="detail">
          <h1>visit our beautiful showroom!</h1>
          <p>our show room is an expression of what we love doing; being creative with floral and
            plant
            arrangements.
            Whether you were looking for a florist for your perfect wedding, or just want to uplift
            any room
            with
            some one of a kind living decor, Blossom with love can help.</p>
          <a href="view_products.php" class="btn">shop now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="testimonial-container">
    <div class="title">
      <img src="img/download.png" class="logo">
      <h1>what people say about us</h1>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia obcaecati odio eveniet a iusto consequatur distinctio corporis fugit. Et obcaecati ipsum aliquam repellat accusantium atque fugit officia, blanditiis maiores neque.
      </p>
    </div>
    <div class="container">
      <div class="testimonial-item">
        <img src="./img/01.jpg">
        <h1>sara smith</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id, necessitatibus, sequi quidem modi debitis quo et iste saepe, deserunt perferendis ex? Eligendi, incidunt esse adipisci quos nesciunt quam distinctio molestiae?
        </p>
      </div>
      <div class="container">
        <div class="testimonial-item">
          <img src="./img/02.jpg">
          <h1>john smith</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id, necessitatibus, sequi quidem modi debitis quo et iste saepe, deserunt perferendis ex? Eligendi, incidunt esse adipisci quos nesciunt quam distinctio molestiae?
          </p>

        </div>
        <div class="container">
          <div class="testimonial-item">
            <img src="./img/03.jpg">
            <h1>mike casper</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id, necessitatibus, sequi quidem modi debitis quo et iste saepe, deserunt perferendis ex? Eligendi, incidunt esse adipisci quos nesciunt quam distinctio molestiae?
            </p>
          </div>
          <div class="left-arrow" onclick="nextSlide()"><i class="bx bxs-left-arrow-alt"></i> </div>
          <div class="right-arrow" onclick="prevSlide()"><i class="bx bxs-right-arrow-alt"></i> </div>
        </div>
      </div>
      <?php include 'componets/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'componets/alert.php'; ?>
</body>

</html>