<?php
// Retrieve image filenames from the database
$selectQuery = "SELECT filename FROM image";
$result = mysqli_query($conn, $selectQuery);

while ($row = mysqli_fetch_assoc($result)) {
  $imagePath = "image/" . $row["filename"];
  echo "<img src='$imagePath' alt='Image'>";
}
