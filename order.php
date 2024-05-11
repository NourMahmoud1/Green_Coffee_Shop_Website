<?php
include './componets/connection.php';
session_start();
if(isset($_SESSION['user_id'] )) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("location:login.php");
  exit;
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
  <title>Green coffee - order page</title>
</head>

<body>
  <?php include 'componets/header.php'; ?>
  <div class="main">
    <div Class="banner">
      <h1>my order</h1>
    </div>
    <div class="title2">
      <a href="home.php">home</a><span>/orders</span>
    </div>

    <section class="products">
      <div class="box-container">
        <div class = "title">
            <img src="img/download.png" class = "logo">
            <h1>my order</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit aut, iusto voluptate delectus est voluptatibus, doloribus vero pariatur officiis, atque nostrum necessitatibus maxime amet molestias. Quis placeat numquam consequuntur deleniti.</p>
        </div>
        <div class = "box-container">
            <?php 

                $select_orders = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY date DESC ") ;
                $select_orders->execute([$user_id]);
                 if ($select_orders->rowcount()>0){
                    while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                        $select_products = $conn->prepare("SELECT * FROM products WHERE id = ?") ;
                        $select_products->execute([$fetch_orders['product_id']]);
                        if($select_products->rowcount()>0){
                            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){

                
            ?>
            <div class = "box" <?php if($fetch_orders['status']=='cancle') { echo ' style = "border:2px solid red"; ' ;}?> >
            <a href="view_order.php?get_id= <?php $fetch_orders['id'] ;?>">
            <p class = "date" ><i class = "bi bi-calender-fill"></i><span><?php $fetch_orders['date'] ;?></span></p>
            <img src="image/<?php $fetch_products['image'];?>" class = "image">
            <div class = "row">
                <h3 class = "name"><?php $fetch_products['name'];?></h3>
                <p class = "price">price  :  <?php $fetch_orders['price'];?>  x  <?php $fetch_orders['qty'] ;?></p>
                <p class = "status" style ="color : <?php if($fetch_orders['status']=='delivered') { echo 'green' ;} elseif($fetch_orders['status']=='cancaled') {echo 'red' ;} else{ echo 'orange' ;} ?>" ></p>
            </div>
            </a>
            </div>
            <?php 
                             }
                       }
                  }
              }else{
                echo '<p class="empty">no orders added</p>' ;
              }

                    
            
            ?>
        </div>
      </div>
    </section>

    <?php include 'componets/footer.php'; ?>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="script.js"></script>
  <?php include 'componets/alert.php'; ?>
</body>

</html>