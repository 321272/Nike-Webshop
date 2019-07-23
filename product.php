    <?php

      include("./connect_db.php");

          $id = $_GET["id"];
            $sql = "SELECT * FROM products WHERE id = '$id';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                   // echo $row['title'] . "<br>";


                   echo'
                    <div class="card mb-3">
                      <div class="row no-gutters">
                        <div class="col-md-8" id="backgrnd-whitesm">
                          <img src="' . $row['imageUrl'] . '" id="product-page-img" alt="...">
                        </div>
                        <div class="col-md-4">
                          <div class="card-body">
                            <h5 class="card-title" style="max-width: 300px;">' . $row['title'] . '</h5><br>
                            <p class="card-text" style="max-width: 300px;">' . utf8_encode($row['description']) . '</p>
                            <a href="#" class="btn btn-outline-dark btn-lg">buy now</a><br><br>
                            <p>vragen over retouren?</p>
                            <a href="mailto:support@nike.nl?SUBJECT=Retourneren" class="btn btn-outline-dark"">info retourneren</a>
                          </div>
                        </div>
                      </div>
                    </div>
                   ';
                }
            }
        ?>