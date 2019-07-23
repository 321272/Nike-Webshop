<div class="carousel automargin">

  <?php
  
  include("./connect_db.php");

  $sql = 'SELECT * FROM products ORDER BY RAND()';

  // check if user searches for a product (sending a post by submitting the form)
  if (!empty($_POST)) {
    $searchTag = htmlspecialchars($_POST['productname']);

    if ($searchTag != '') {
      $sql = "SELECT * FROM products WHERE title LIKE '%" . $searchTag . "%'  ORDER BY RAND()"; 
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
                <h5 class="card-title" id="home-card">' . $row['title'] . '</h5>
                <a href="index.php?content=product&id=' . $row['id'] . '" class="btn btn-secondary">View</a>
              </div>
            </div> 
          </div>
        </div>
        ';
    }
  }

?>

</div>