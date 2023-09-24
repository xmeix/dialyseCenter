<?php
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionPatientList_inc.php";
include_once "includes/FonctionFacture_inc.php";
//CALL FUNCTION THAT DELETE PATIENTS
if(isset($_GET['PatientDelete']))
{
    $PatientUsername=$_GET['PatientDelete'];
    DeleteUser($conn,$PatientUsername);
    header("location: ListePatients.php?Error=PatientDeleted");
    exit();
}


//CALL FUNCTION THAT SHOWS PROFILE INFORMATIONS
if(isset($_GET['PatientUsername']))
{
            $PatientUsername=$_GET['PatientUsername'];
            $result=GetInfoByUsername($conn,$PatientUsername);

            while($row=mysqli_fetch_assoc($result)){
                
                $userId=$row['user_Id'];
                $userNom=$row["user_Nom"];
                $userPrenom=$row["user_Prenom"];
                $userGenre=$row["user_Genre"];
                $userDateNaiss=$row["user_DateNaiss"];
                $userLieuNaiss=$row["user_LieuNaiss"];
                $userEmail=$row["user_Email"];
                $userUsername=$row["user_Username"];
                $userNtel=$row["user_Ntel"];
                $userGSang=$row["user_GSang"];
                $userMChron=$row["user_MChron"];
                $userAdresse=$row["user_Adresse"];

            }
            //IF FUNCTION FACTURE (SHOW HISTORIQUE)
    if(isset($_GET['Function']))
    {
              if($_GET['Function']=="Facture"){

                    //FROM HISTORIQUE IF DELETE THAN DELETE AND THAN SHOW HISTORIQUE AGAIN
                    if(isset($_GET['FactureDelete'])){

                      $FactureId=$_GET['FactureDelete'];
                      $userUsername=$_GET['PatientUsername'];
                      DeleteFacture($conn,$FactureId); 
                    }
                    //FOR SHOWING A CERTAIN FAC
                    if(isset($_GET['Facture'])){
                      if($_GET['Facture']=="Show"){

                      $FactureId=$_GET['FactureId'];
                      $result2=GetInfoByFactureId($conn,$FactureId);
                      while($row2=mysqli_fetch_assoc($result2)){
                        $Facture_Id=$row2['Facture_Id'];
                        $Facture_Date=$row2['Facture_Date'];
                        $Patient_Seances=$row2['Patient_Seances'];
                        $Seance_Prix=$row2['Seance_Prix'];
                        $Frais_Soins=$row2['Frais_Soins'];
                        $Facture_Montant=$row2['Facture_Montant'];
                        /*$Year=date('Y', strtotime($row['Facture_Date']));
                        $Month=date('M', strtotime($row['Facture_Date']));
                        $Day=date('D', strtotime($row['Facture_Date']));*/
                        
                       }
                        $Info="DateFacture=".$Facture_Date."&PatientSeances=".$Patient_Seances."&SeancePrix=".$Seance_Prix."&FraisSoins=".$Frais_Soins."&FactureMontant=".$Facture_Montant."&FactureId=".$Facture_Id;
                        echo $Info;
                        header("location: ListePatients.php?Function=Facture&Show=Yes&UserNom=$userNom&UserPrenom=$userPrenom&UserId=$userId&UserDateNaiss=$userDateNaiss&PatientUsername=$userUsername&$Info");
                        exit();
                     }
                  }
            

                      header("location: ListePatients.php?Function=Facture&UserNom=$userNom&UserPrenom=$userPrenom&UserId=$userId&UserDateNaiss=$userDateNaiss&PatientUsername=$userUsername");
                      exit();

                }

     }

            $NomPrenom=$userNom." ".$userPrenom;

            header("location: ListePatients.php?Profil=show&User=$NomPrenom&PatientUsername=$userUsername");
            exit();


}

