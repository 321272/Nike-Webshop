
<div class="carousel">

  <?php 
  $userrole = ['customer', 'root'];
  include("./security.php");
  include("./connect_db.php");

  $sql = 'SELECT * FROM products';

  // check if user searches for a product (sending a post by submitting the form)
  if (!empty($_POST)) {
    $searchTag = htmlspecialchars($_POST['productname']);

    if ($searchTag != '') {
      $sql .= " WHERE title LIKE '%" . $searchTag . "%'";
    }
  }

  // query database
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {                
      echo '
        <div class="row marginlr">
          <div class="col-sm marginlr">
            <div class="card" style="width: 22rem;">
              <img src="' . $row['imageUrl'] . '" class="card-img-top product-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">' . $row['title'] . '</h5>
                <a href="#" class="btn btn-secondary">Add to cart</a>
              </div>
            </div> 
          </div>
        </div>
        ';
    }
  }

?>

</div>