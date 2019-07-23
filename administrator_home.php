<?php 
  $userrole = ['administrator', 'root'];
  include("./connect_db.php");
  include("./security.php");
?>

<table id="test" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Email</th>
      <th scope="col">Userrole</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<?php
        $sql = "SELECT * FROM `login`;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['title'] . "<br>";
            
                echo '
                  
                  <tr>
                    <th scope="row">' . $row['id'] . '</th>
                    <td>' . $row['email'] . '</td>
                    <td>
                      <li class="nav-item automargin">
                        <span class="nav-link">
                          ' . $row['userrole'] . '
                        </span>
                        <div class="dropdown-btn">
                          <a class="dropdown-item" href="update.php?id=' . $row['id'] . '&userrole=administrator">Admin</a>
                          <a class="dropdown-item" href="update.php?id=' . $row['id'] . '&userrole=customer">Customer</a>
                        </div>
                      </li>
                    </td>
                    <td>       
                      <!-- Button trigger modal -->
                      <a href="delete.php?id=' . $row['id'] . '">
                        <img src="/img/trash.jpg" height="32"/>
                      </a>
                ';
            }
        }
    ?>
  </tbody>
</table>
