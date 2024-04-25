
  <?php include 'componets/connection.php' ?>
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
          <div class="slide-detail" >
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
    <section class="thumb">
      <div class="box-container">
        <div class="box">
          <img src="img/thumb2.jpg" alt="" >
          <h3>green tea</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
          <img src="img/thumb0.jpg" alt="" >
          <h3>lemon coffee</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
          <img src="img/thumb1.jpg" alt="" >
          <h3>green tea</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
          <img src="img/thumb.jpg" alt="" >
          <h3>green tea</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <i class="bx bx-chevron-right"></i>
        </div>
      </div>
  </section>
  <!-- image in the right and test in the left -->
  <section class="container">
    <div class="box-container">
      <div class="box">
        <img src="./img/about-us.jpg" alt="" srcset="">
      </div>
      <div class="box">
        <img src="./img/download.png" alt="" srcset="">
        <span>healthy tea</span>
        <h1>save up to 50% off</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
      </div>
    </div>
  </section>
  <!--  -->
  <section class="shop">
    <div class="title">
      <img src="./img/download.png" alt="thrending image" srcset="">
      <h1>Trending Products</h1>
    </div>
    <div class="row" >
      <img src="./img/about.jpg" alt="about image" srcset="" >
      <div class="row-detail" >
        <img src="./img/basil.jpg" alt=".." srcset="" style="width: 100%;" >
        <div class="top-footer">
          <h1>a cup of green tea makes you healthy</h1>
        </div>
      </div>
    </div>
    <div class="box-container">
      <div class="box">
        <img src="./img/card.jpg" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
      <div class="box">
        <img src="./img/card0.jpg" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
      <div class="box">
        <img src="./img/card1.jpg" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
      <div class="box">
        <img src="./img/card2.jpg" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
      <div class="box">
        <img src="./img/10.jpg" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
      <div class="box">
        <img src="./img/6.webp" alt="card image" srcset="">
        <a href="view_products.php" class="btn">shop now</a>
      </div>
    </div>
  </section>
  <!-- -************************-***************-************- -->
  <section class="shop-category">
    <div class="box-container">
      <div class="box">
        <img src="./img/6.jpg" alt="" srcset="">
        <div class="detail">
          <span>BIG OFFERS</span>
          <h1>Extra 15% off</h1>
          <a href="view_products.php" class="btn">shop now</a>
        </div>
      </div>
      <div class="box">
        <img src="./img/7.jpg" alt="" srcset="">
        <div class="detail">
          <span>new in taste</span>
          <h1>coffee house</h1>
          <a href="view_products.php" class="btn">shop now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ****************-****************************** -->
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
  <!-- ------------------------------------------------- -->
  <section class="brand">
    <div class="box-container">
      <div class="box">
        <img src="./img/brand (1).jpg" alt="" srcset="">
      </div>
      <div class="box">
        <img src="./img/brand (2).jpg" alt="" srcset="">
      </div>
      <div class="box">
        <img src="./img/brand (3).jpg" alt="" srcset="">
      </div>
      <div class="box">
        <img src="./img/brand (4).jpg" alt="" srcset="">
      </div>
      <div class="box">
        <img src="./img/brand (5).jpg" alt="" srcset="">
      </div>
    </div>
  </section>
    <?php  include 'componets/footer.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>
</html>