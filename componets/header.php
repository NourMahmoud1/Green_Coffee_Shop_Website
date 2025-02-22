<header class="header">
  <div class="flex">
    <a href="home.php" class="logo"><img src="img/logo.jpg" alt=""></a>
    <nav class="navbar">
      <a href="home.php">home</a>
      <a href="view_products.php">products</a>
      <a href="order.php">orders</a>
      <a href="about.php">about us</a>
      <a href="contact.php">contact us</a>
    </nav>
    <div class="icons">
      <i class="bx bx-user" id="user-btn"></i>
      <?php
      // Check if the user is logged in and the session variable 'user_id' is set
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
      } else {
        $user_id = null; // or redirect to login page
      }

      // Existing code...
      $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
      $count_wishlist_items->execute([$user_id]);
      $total_wishlist_items = $count_wishlist_items->rowCount();

      // Existing code...
      $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $count_cart_items->execute([$user_id]);
      $total_cart_items = $count_cart_items->rowCount();

      // Rest of your code...
      ?>
      <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup><?= $total_wishlist_items  ?></sup></a>
      <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i><sup><?= $total_cart_items  ?></sup></a>
      <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
    </div>
    <div class="user-box">
      <p>username : <span> <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Please Login'; ?> </span></p>
      <p>Email : <span> <?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Please Login'; ?> </span></p>
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="btn">register</a>
      <form action="" method="post">
        <button type="submit" name="logout" class="logout-btn">log out</button>
      </form>
    </div>
  </div>
</header>