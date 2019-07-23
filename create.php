<?php

  $userrole = ['administrator', 'root'];
  include("./security.php");
  include("./connect_db.php");

  $title = htmlspecialchars($_POST["title"]);
  $desc = htmlspecialchars($_POST['description']);
  $imageUrl = htmlspecialchars($_POST['image']);
  $cat = htmlspecialchars($_POST['catagory']);
  $subcat = htmlspecialchars($_POST['subcatagory']);

  $sqlFormat = "INSERT INTO `products`(`title`, `description`, `imageUrl`, `catagory`, `subcatagory`) VALUES ('%s','%s','%s','%s','%s')";
  $sql = sprintf($sqlFormat, $title, $desc, $imageUrl, $cat, $subcat);

  if (mysqli_query($conn, $sql) === TRUE) {
    echo "Product added";
  } else {
    echo "Product could not be added";
  };

?>