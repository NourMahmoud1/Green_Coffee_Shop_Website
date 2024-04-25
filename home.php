
  <?php include 
  
  'componets/connection.php';
  session_start();
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  }else {
    $user_id ='' ;
  }
  if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php") ;
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
  <title>Green coffee - home page</title>
</head>
<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <section class="home-section" >
      <div class="slider" >
        <div class="slider__slider slide1">
          <div class="overlay"></div>
          <div class="slide-detail">
            <h1>Lorem ipsum dolor sit</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            <a href="view_products.php" class="btn">shop now</a>
          </div>
          <div class="hero-dec-top"></div>
          <div class="hero-dec-bottom"></div>
        </div>
        <!-- slider end -->
        <div class="slider__slider slide2">
          <div class="overlay"></div>
          <div class="slide-detail">
            <h1>welcome to my shop</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            <a href="view_products.php" class="btn">shop now</a>
          </div>
          <div class="hero-dec-top"></div>
          <div class="hero-dec-bottom"></div>
        </div>
        <!-- slider end -->
        <div class="slider__slider slide3">
          <div class="overlay"></div>
          <div class="slide-detail">
            <h1>Lorem ipsum dolor sit</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            <a href="view_products.php" class="btn">shop now</a>
          </div>
          <div class="hero-dec-top"></div>
          <div class="hero-dec-bottom"></div>
        </div>
        <!-- slider end -->
      <div class="slider__slider slide4">
          <div class="overlay"></div>
          <div class="slide-detail">
            <h1>Lorem ipsum dolor sit</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            <a href="view_products.php" class="btn">shop now</a>
          </div>
          <div class="hero-dec-top"></div>
          <div class="hero-dec-bottom"></div>
        </div>
        <!-- slider end -->
      <div class="slider__slider slide5">
          <div class="overlay"></div>
          <div class="slide-detail">
            <h1>Lorem ipsum dolor sit</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            <a href="view_products.php" class="btn">shop now</a>
          </div>
          <div class="hero-dec-top"></div>
          <div class="hero-dec-bottom"></div>
        </div>
        <!-- slider end -->
        <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
        <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
      </div>
    </section>
    <!-- home slider end -->
    <?php  include 'componets/footer.php'; ?>

  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>
</html>