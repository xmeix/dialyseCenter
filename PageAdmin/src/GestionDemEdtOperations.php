<?php


if(isset($_GET['Op'])){
    include_once "../../src/includes/DataBaseConn.php";
    include_once "includes/FonctionGestionDemEdt_inc.php";
    if($_GET['Op']=='Refuse'){

        

            $DemId=$_GET['Demande'];
            echo $DemId;
            SupprimerDembyDemId($conn,$DemId);
            header('location: GestionDemEdt.php?Demande=Refused');
        

    }
    
    if($_GET['Op']=='Accept'){
        
            $Dem=$_GET['Demande'];
            $Pat=$_GET['PatientId'];
            //Si Patient Id ALready exist in table then delete the old ACCEPTED FROM THE TWO TABLES AND CREATE IN ONLY ONE AND CHANGE STATE
            
            $resultData=AlreadyExist($conn,$Pat);//si deja accepte state=1
                if($row = mysqli_fetch_assoc($resultData))              
                {
                        $R=$row['Id_Dem'];//ON prend son ID 
                }else{ 
                        $R="false";//sinon si il a trouvé une demande pas accepté 
                }
                   

          if($R=="false"){ //si n existe pas nrmlmnt on cree une autre demande directe et on change l etat
                   ChangeDemandeState($conn,$Dem);
                   header('location: GestionAffectation.php');
            }else{
                    //DeleteSeance($conn,$Pat);
                    SupprimerDembyDemId($conn,$R);
                    ChangeDemandeState($conn,$Dem);
                   header('location: GestionDemEdt.php?Demande=Modified');
            }

                
        

    }



}