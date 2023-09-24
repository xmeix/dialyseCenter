<?php

if(isset($_POST['SearchP'])){

    include_once "../../../src/includes/DataBaseConn.php";
    $searchVP=mysqli_real_escape_string($conn,$_POST['searchVP']);
    
        header("location: ../ProfilesPatients.php?searchValueP=".$searchVP);
        exit();
    

            }



if(isset($_POST['Reload'])){

                header("location: ../ProfilesPatients.php");
                exit();
}            