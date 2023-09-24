<?php

if(isset($_POST['SearchF'])){

    include_once "../../../src/includes/DataBaseConn.php";
    $searchVF=mysqli_real_escape_string($conn,$_POST['searchVF']);
    
        header("location: ../Fourniture.php?searchValueF=".$searchVF);
        exit();
    

            }
if(isset($_POST['Reload'])){

                header("location: ../Fourniture.php");
                exit();
}