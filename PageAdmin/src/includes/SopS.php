<?php

if(isset($_POST['SearchM'])){

    include_once "../../../src/includes/DataBaseConn.php";
    $searchVM=mysqli_real_escape_string($conn,$_POST['searchVM']);
    
        header("location: ../ListeStaff.php?searchValueM=".$searchVM);
        exit();
    

            }
            if(isset($_POST['SearchI'])){

                include_once "../../../src/includes/DataBaseConn.php";
                $searchVI=mysqli_real_escape_string($conn,$_POST['searchVI']);
                
                    header("location: ../ListeStaff.php?searchValueI=".$searchVI);
                    exit();
                
            
                        }
if(isset($_POST['Reload'])){

                header("location: ../ListeStaff.php");
                exit();
}