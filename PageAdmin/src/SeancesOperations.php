<?php


if(isset($_GET['OP'])){
    if($_GET['OP']==="Erase"){

        include_once "../../src/includes/DataBaseConn.php";
        include_once "includes/FonctionSeancesEdt.php";
        $Patient=$_GET['Patient'];
        echo $Patient;
        EraseEdt($conn,$Patient);

        header('location: SeancesEdt.php?Edt=Erased');
        exit();
        
    }
    
}


    