<?php
// Connect to the database (use your credentials)
// 'mysql:host=localhost;dbname=shop_db'
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// INSERT INTO `products`(`id`, `name`, `price`, `image`, `product_details`)
//  VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = $_FILES["uploadfile"]["name"]; // Get the uploaded filename
  $target_path = "image/" . basename($filename); // Set the target path
  $name = $_POST['name'];
  $price = $_POST['price']; // Get

  $detail = $_POST['detail'];

  // Move the uploaded file to the server
  if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_path)) {
    // Insert the filename into the database and product information
    $stmt = $conn->prepare("INSERT INTO products (image, name, price, product_detail) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $filename, $name, $price, $detail);

    if ($stmt->execute()) {
      echo "Product Information uploaded successfully!";
    } else {
      echo "Error uploading Product Information";
    }
    $stmt->close();
  }
}
?>
<style type="text/css">
  <?php include 'style.css' ?>
</style>


<style>
  .sect {
    margin-bottom: 15px;
  }

  .body-container {
    background: #fff;
    box-shadow: var(--box-shadow);

    margin: 2rem auto;
    padding: 1rem 0;
    border-radius: 11px;
  }
</style>


<!DOCTYPE html>
<html>

<head>
  <title>Image Upload</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body style="margin-top: 10%;">
  <div class="container body-container">
    <h3>Product Information</h3>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="form-group ">

        <div class="form-row sect ">
          <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Product Name" required>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="price" placeholder="Product Price" required>
          </div>
        </div>
        <textarea class="form-control  sect" name="detail" id="validationTextarea" placeholder="Product detail" required></textarea>
        <div class="sect">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="uploadfile" id="customFile" required>
            <label class="custom-file-label" for="customFile">Choose Image</label>
          </div>
          <!-- <div class="custom-file">
            <input type="file" class="custom-file-input is-invalid" id="validatedInputGroupCustomFile" required>
            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
          </div> -->
        </div>


        <!-- Add other form fields if needed -->
        <input type="submit" value="Upload" class="btn btn-primary sect" />
        <!-- <button type="submit">Submit form</button> -->

      </div>

    </form>
  </div>
</body>

</html>