<?php
  // Maak een verbinding met de database
  include("./connect_db.php");

  // Maak de functie sanitize beschikbaar op de pagina functions.php
  include("./functions.php");

  $password = sanitize($_POST["password"]);
  $verify_password = sanitize($_POST["verify_password"]);
  $id = sanitize($_POST["id"]);
  $pw = sanitize($_POST["pw"]);

  if ( !strcmp($password, $verify_password)) {
    
    // Als de wachtwoorden gelijk zijn dan vragen we het record op basis van id op uit de database
    $sql = "SELECT * FROM `login` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($result) == 1 ) {

      $record = mysqli_fetch_assoc($result);

      if ( password_verify($record["password"], $pw) ) {
        // Sla het gehashte password op in de database

        $blowfish_password = password_hash($password, PASSWORD_BCRYPT);
  
        if ( !empty($password) && !empty($verify_password)) {
          $sql = "UPDATE  `login` 
                  SET     `password` = '$blowfish_password'
                  WHERE   `id`       = $id";
    
          $result = mysqli_query($conn, $sql);
    
          if ($result) {
            // Selecteer het emailadres en geef dit mee als $_GET variabele aan de url
            $sql = "SELECT * FROM `login` WHERE `id` = $id";
    
            $result = mysqli_query($conn, $sql);
    
            $record = mysqli_fetch_assoc($result);
    
            $email = $record["email"];
    
            echo '<div class="alert alert-success" role="alert">Uw wachtwoord is veranderd. U wordt doorgestuurd naar de inlogpagina waar u kunt inloggen.</div>';
            header("Refresh: 4; url=./index.php?content=loginform&email=$email");
          } else {
            echo '<div class="alert alert-danger" role="alert">Er is een fout opgetreden. Probeer het nogmaals.</div>';
            header("Refresh: 4; url=./index.php?content=home");
          }
        } else {
          echo '<div class="alert alert-danger" role="alert">U heeft een van beide wachtwoordvelden niet ingevuld. Probeer het nogmaals.</div>';
          header("Refresh: 4; url=./index.php?content=createpassword&id=$id");
        }
      } else {
        // U mag geen gebruik maken van de activatiepagina
        echo '<div class="alert alert-danger" role="alert">Het gehashte password matched niet met het id in de activatielink</div>';
        header("Refresh: 4; url=./index.php?content=home");
      }
    } else {
      // Het id is niet bekent in de tabel
      echo '<div class="alert alert-danger" role="alert">Het id in de activatielink is niet bij ons.</div>';
      header("Refresh: 2; url=./index.php?content=home");
    }    
  } else {
    //  Als de wachtwoorden niet gelijk zijn...
    echo '<div class="alert alert-danger" role="alert">De door u ingevulde wachtwoorden zijn niet gelijk, Probeer het nogmaals</div>';
    header("Refresh: 4; url=./index.php?content=createpassword&id=$id&pw=$pw");
  }  
?>