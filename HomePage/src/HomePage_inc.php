<?php

if(isset($_POST['Envoyer'])){
    include_once "FonctionHomePage_inc.php";
    include_once "../../src/includes/DataBaseConn.php";
    $Nom=mysqli_real_escape_string($conn,$_POST['Nom']);
    $Prenom=mysqli_real_escape_string($conn,$_POST['Prénom']);
    $Email=mysqli_real_escape_string($conn,$_POST['E-Mail']);
    $Mesage=mysqli_real_escape_string($conn,$_POST['Message']);
    $Msg=str_replace(array('\n','\r',' '), array("\n","\r"," "), $Mesage);
    $Messag=trim($Msg);
    $Message=stripslashes($Messag);

    SendMessageToAdmin($conn,$Nom,$Prenom,$Email,$Message);

    header('location: HomePage.php?Msg=Send');
    exit();
}