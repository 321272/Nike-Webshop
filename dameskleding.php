<?php
      // Maak een verbinding met de database
  include("./connect_db.php");
?>


<!doctype html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="https://www.festisite.com/static/partylogo/img/logos/nike.png" />

  <!-- Stylesheet-->
  <link rel="stylesheet" href="./css/style.css">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Dames</title>
</head>

<body>

  <h1 class="automargin">Dames kleding</h1>

  <div class="container">

    <?php
            $sql = "SELECT * FROM products WHERE catagory = 'dames' AND subcatagory = 'kleding';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                   // echo $row['title'] . "<br>";
                
                   echo '
                   <div class="row topmargin">
                     <div class="col-sm">
                           <div class="card" style="width: 22rem;">
                            <img src="' . $row['imageUrl'] . '" class="card-img-top product-img" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['title'] . '</h5>
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


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>