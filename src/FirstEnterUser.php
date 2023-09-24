<?php
session_start();
?>
<?php

require_once "includes/DataBaseConn.php";
require_once "includes/Fonctions_inc.php";

if(isset($_SESSION["user_Username"])){
    
    $Username=$_SESSION["user_Username"];
    $Usertype = WhoIsUsing($conn,$Username);
    
    if($Usertype==="patient"){

        header("location:../PagePatient/src/PagePatient.php");
        exit();
    }elseif($Usertype==="admin"){

        header("location:../PageAdmin/src/PageAdmin.php");
        exit();

    }elseif($Usertype==="Medecin"){

        header("location: ../PageMedecin/src/PageMedecin.php");
        exit();

    }
    
}
else{
    header("location:../Profile.php?Error=ProfileNotLoad");
}


?>