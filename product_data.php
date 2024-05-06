<?php
// Connect to the database (use your credentials)
// 'mysql:host=localhost;dbname=shop_db'
$conn = mysqli_connect("localhost", "root", "", "shop_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = $_FILES["uploadfile"]["name"]; // Get the uploaded filename
  $target_path = "image/" . basename($filename); // Set the target path

  // Move the uploaded file to the server
  if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_path)) {
    // Insert the filename into the database
    $insertQuery = "INSERT INTO products (image) VALUES ('$filename')";
    mysqli_query($conn, $insertQuery);
    echo "Image uploaded successfully!";
  } else {
    echo "Error uploading image.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Image Upload</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
  <div id="content">
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
        <input class="form-control" type="file" name="uploadfile" />
        <!-- Add other form fields if needed -->
        <input type="submit" value="Upload" />
      </div>
    </form>
  </div>
</body>

</html>