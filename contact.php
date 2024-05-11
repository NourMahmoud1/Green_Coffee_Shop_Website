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
  <title>Green coffee - home page</title>
</head>

<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <div Class="banner">
      <h1>contact us</h1>
    </div>
    <div class="title2">
      <a href="home.php">home</a><span>/contact us</span>
    </div>
    <section class="services">
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
            <h1>gift vouchers</h1>
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
    <div class="form-container">
      <form method="post">
        <div class="title">
          <img src="img/download.png" class="logo">
          <h1>leave a message</h1>
        </div>
        <div class="input-field">
          <p>your name <sup>*</sup></p>
          <input type="text" name="name">
        </div>
        <div class="input-field">
          <p>your email <sup>*</sup></p>
          <input type="email" name="email">
        </div>
        <div class="input-field">
          <p>your number <sup>*</sup></p>
          <input type="text" name="number">
        </div>
        <div class="input-field">
          <p>your message <sup>*</sup></p>
          <textarea name="message"></textarea>
        </div>
        <button type="submit" name="submit-btn" class="btn">send message</button>
      </form>
    </div>
    <div class="address">
      <div class="title">
        <img src="img/download.png" class="logo">
        <h1>contact detail</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique explicabo accusantium placeat porro maiores,
        </p>
      </div>
      <div class="box-container">
        <div class="box">
          <i class="bx bxs-map-pin"></i>
          <div>
            <h4>address</h4>
            <p>1092 Merigold Lane, Coral Way</p>
          </div>
        </div>
        <div class="box">
          <i class="bx bxs-phone-call"></i>
          <div>
            <h4>phone number</h4>
            <p>098807887</p>
          </div>
        </div>
        <div class="box">
          <i class="bx bxs-map-pin"></i>
          <div>
            <h4>email</h4>
            <p>projectTeam@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
    <?php include 'componets/footer.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>

</html>



