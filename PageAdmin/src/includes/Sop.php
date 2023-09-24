<?php

if(isset($_POST['Search'])){

    include_once "../../../src/includes/DataBaseConn.php";
    $searchV=mysqli_real_escape_string($conn,$_POST['searchV']);
    
        header("location: ../ListePatients.php?searchValue=".$searchV);
        exit();
    

            }
if(isset($_POST['Reload'])){

                header("location: ../ListePatients.php");
                exit();
}