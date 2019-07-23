<?php
    session_start();
    $userrole = ['administrator', 'root'];
    include("./security.php");
    
    include("./connect_db.php");

    $id = $_GET["id"];
    $newUserrole = $_GET["userrole"];

    $sql = "UPDATE login SET userrole='" . $newUserrole . "' WHERE id = $id";

    mysqli_query($conn, $sql);

    header("Location: ./index.php?content=administrator_home");
    exit();

?>
