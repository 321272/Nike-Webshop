<?php
    session_start();
    $userrole = ['administrator', 'root'];
    include("./security.php");
    
    include("./connect_db.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM `login` WHERE `id` = $id";

    mysqli_query($conn, $sql);

    header("Location: ./index.php?content=administrator_home");
    exit();

?>
