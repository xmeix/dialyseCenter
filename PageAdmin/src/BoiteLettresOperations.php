<?php



if(isset($_GET['OP'])){
    if($_GET['OP']=="Delete"){
        include_once "../../src/includes/DataBaseConn.php";
        include_once "includes/FonctionBoiteLettres.php";
        $CId=$_GET['CId'];
        DeleteMsg($conn,$CId);
        header('location: BoiteLettres.php?Error=Deleted');
        exit();
    }
}