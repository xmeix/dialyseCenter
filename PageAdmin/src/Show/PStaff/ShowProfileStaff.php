<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PPatient/Show.css?v=2">
    <title>UserProfAdmin</title>
</head>
<body>
    <div class="hello">
        
            <?php
            include "../../../../src/includes/DataBaseConn.php";
            include "../../includes/FonctionStaffList_inc.php";
            
            if(isset($_GET['StaffId'])){
                $StaffId=$_GET['StaffId'];
                
                $result=GetInfoById($conn,$StaffId);
                $resultStaff=GetInfoStaffById($conn,$StaffId);

                while($row=mysqli_fetch_assoc($result)){

                    $StaffId=$row['user_Id'];
                    $StaffNom=$row["user_Nom"];
                    $StaffPrenom=$row["user_Prenom"];
                    $StaffGenre=$row["user_Genre"];
                    $StaffDateNaiss=$row["user_DateNaiss"];
                    $StaffLieuNaiss=$row["user_LieuNaiss"];
                    $StaffEmail=$row["user_Email"];
                    $StaffNtel=$row["user_Ntel"];
                   
                    $StaffAdresse=$row["user_Adresse"];
                    $StaffType=$row['user_Type'];
                    
                    if($StaffType=="Medecin"){
                        $StaffUsername=$row["user_Username"];
                    }
                }

                while($row2=mysqli_fetch_assoc($resultStaff)){

                    $NSS=$row2["NSS"];
                    $DateRec=$row2["Date_Recrutement"];
                    $Sfam=$row2["Situation_Fam"];

                }
            
                ?>
                
                <!--FORM FOR PROFILE IN ADMIN-->
                
                <form action="ShowProfileStaff_inc.php?StaffId=<?php echo $StaffId;?>" method="POST" class="form-Profile-user">
                <div class="input-field">
                <label for="StaffNom">Nom:</label>
                <input type="text" name="StaffNom" value="<?php echo $StaffNom;?>" >
                </div>
                <div class="input-field">
                <label for="StaffPrenom">Prenom:</label>
                <input type="text" name="StaffPrenom" value="<?php echo $StaffPrenom;?>" >
                </div>
                <div class="input-field">
                <label for="StaffDateNaiss">Date de naissance:</label>
                <input type="date" name="StaffDateNaiss" value="<?php echo $StaffDateNaiss;?>" >
                </div>
                <div class="input-field">
                <label for="StaffLieuNaiss">Lieu de naissance:</label>
                <input type="text" name="StaffLieuNaiss" value="<?php echo $StaffLieuNaiss;?>" >
                </div>

                <div class="input-field">
                <label for="StaffAdresse">Adresse:</label>
                <input type="text" name="StaffAdresse" value="<?php echo $StaffAdresse;?>" >
                </div>
                <div class="input-field">
                <label for="Sfam">Situation familiale:</label>
                <input type="text" name="Sfam" value="<?php echo $Sfam;?>" >
                </div>
                <div class="input-field">
                <label for="NSS">Numéro de sécurité sociale:</label>
                <?php
                 if(isset($_GET['Modif']))
                 {
                     if($_GET['Modif']=='InvalidNSS'){
                        
                        ?>
                            <input type="text" name="NSS" value="<?php echo $NSS;?>" >

                         <?php
                        echo "<p class='error'>Numero de sécurité sociale Invalide </p>";
                     }else{
                        ?>
                            <input type="text" name="NSS" value="<?php echo $NSS;?>" >

                        <?php
                        }

                 }else{
                     ?>
                            <input type="text" name="NSS" value="<?php echo $NSS;?>" >

                 <?php
                }
                
                ?>
                </div>
                <div class="input-field">
                <label for="DateRec">Date de recrutement:</label>
                <input type="date" name="DateRec" value="<?php echo $DateRec;?>" >
                </div>

                <div class="input-field">
                <label for="StaffNtel">Numero de téléphone:</label>
                
                <?php
                 if(isset($_GET['Modif']))
                 {
                     if($_GET['Modif']=='InvalidPhoneNumber'){
                        
                        ?>
                            <input class="err" type="text" name="StaffNtel" value="<?php echo $StaffNtel;?>" >
                         <?php
                        echo "<p class='error'>Numero de téléphone Invalide </p>";
                     }else{
                        ?>
                        <input  type="text" name="StaffNtel" value="<?php echo $StaffNtel;?>" >
                        <?php
                        }

                 }else{
                     ?>
                     <input  type="text" name="StaffNtel" value="<?php echo $StaffNtel;?>" >
                 <?php
                }
                
                ?>
                </div>

                
                <div class="input-field">
                <label for="StaffLieuNaiss">GENRE:</label>
                    <div class="input-field-genre">
                    <?php
                    if( $StaffGenre==="Homme"){
                    ?>
                        <input type="radio" id="male" name="Genre" value="Homme" checked requierd />Homme
                        <input type="radio" id="female" name="Genre" value="Femme" />Femme
                    <?php
                    }else{
                    ?>

                        <input type="radio" id="male" name="Genre" value="Homme" requierd />
                        <label>Homme</label>
                        <input type="radio" id="female" name="Genre" value="Femme" checked/>
                        <label>Femme</label>

                     <?php
                    }
                    ?>
                    </div>
                 </div>

                 <div class="input-field">
                <label for="StaffEmail">E-mail:</label>
                <input type="text" name="StaffEmail" value="<?php echo $StaffEmail;?>" >
                <p class="info">"Information de connexion: Seul le médecin lui-meme  pourra le modifier"</p>
                </div>

               <?php if($StaffType=="Medecin"){?>
                    <div class="input-field">
                    <label for="StaffUsername">Nom d'utilisateur:</label>
                    <input type="text" name="StaffUsername" value="<?php echo $StaffUsername;?>" >
                    <p class="info">"Information de connexion: Seul le médecin lui-meme pourra le modifier"</p>
                    </div>
                <?php } ?>
                


                    <!--Buttons-->
                    <center>
                    <button type="submit" name="Enregistrer">Enregistrer</button>
                    <button type="reset" name="Annuler" >Annuler</button>
                    </center>

                    <?php

                        if(isset($_GET['Modif'])){
                            if($_GET['Modif']=="success"){
                                ?>
                                <center><div class="success">
                                    Modification avec succés.

                                </div></center>

                                <?php
                            }
                    }
                    ?>


                </form>




                <?php
            }
            ?>

    </div>
    
</body>
</html>