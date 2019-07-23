<?php
  session_start();
  session_unset();
  session_destroy();
  echo '<div class="alert alert-danger" role="alert">
          U bent succesvol uitgelogd, u wordt doorgestuurd naar de algemene homepagina
        </div>';
  header("Refresh: 0; url=./index.php?content=home");
?>