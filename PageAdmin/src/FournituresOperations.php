<?php
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionFourniture_inc.php";


if(isset($_GET['Operation'])){
    $IdF=$_GET['IdF'];
    
    if($_GET['Operation']=='Add')
    {
        $QteF=$_GET['QteF'];
        AddQteF($conn,$IdF,$QteF);
        header("Location: Fourniture.php?Qte=+1");

        exit();
    }elseif($_GET['Operation']=='Rem'){
        $QteF=$_GET['QteF'];
        RemQteF($conn,$IdF,$QteF);
        header("Location: Fourniture.php?Qte=-1");

        exit();
    }elseif($_GET['Operation']=='Del'){
        DelF($conn,$IdF);
        header("Location: Fourniture.php?Qte=deleted");

        exit();
    }
}