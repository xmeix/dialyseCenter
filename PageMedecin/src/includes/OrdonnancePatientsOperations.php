<?php
 if(!isset($_SESSION)){
    session_start();
}
if(isset($_GET['OP'])){
    if($_GET['OP']==="Delete"){
        include_once "../../../src/includes/DataBaseConn.php";
        include_once "FonctionOrdonnancePatients_inc.php";


        $OrdId=$_GET['OrdId'];
        $Patient=$_GET['Patient'];
        
        $Nom=$_GET['Nom'];
        $Prenom=$_GET['Prenom'];
        $NomPrenom=$Nom." ".$Prenom;
        DeleteOperInfo($conn,$OrdId);
        header('location: ../OrdonnancePatients.php?OP=HistO&Patient='.$Patient.'&UNP='.$NomPrenom.'&Nom='.$Nom.'&Prenom='.$Prenom);
        exit();
    }

}