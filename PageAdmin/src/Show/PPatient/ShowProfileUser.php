<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Show.css?v=10">
    <title>UserProfAdmin</title>
</head>
<body>
    <div class="hello">
        
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            include "../../../../src/includes/DataBaseConn.php";
            include "../../includes/FonctionPatientList_inc.php";
            
            if(isset($_GET['PatientUsername'])){
                $UserUsername=$_GET['PatientUsername'];
                
                $result=GetInfoByUsername($conn,$UserUsername);

                while($row=mysqli_fetch_assoc($result)){
                    $Patient=$row['user_Id'];
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
            
                ?>
                
                <!--FORM FOR PROFILE IN ADMIN-->
                
                <form action="ShowProfileUser_inc.php?PatientUsername=<?php echo $userUsername;?>&PatientId=<?php echo $Patient;?>" method="post" class="form-Profile-user">
                <div class="input-field">
                <label for="UserNom">Nom:</label>
                <input type="text" name="UserNom" value="<?php echo $userNom;?>" >
                </div>
                <div class="input-field">
                <label for="UserPrenom">Prenom:</label>
                <input type="text" name="UserPrenom" value="<?php echo $userPrenom;?>" >
                </div>
                <div class="input-field">
                <label for="UserDateNaiss">Date de naissance:</label>
                <input type="date" name="UserDateNaiss" value="<?php echo $userDateNaiss;?>" >
                </div>
                <div class="input-field">
                <label for="UserLieuNaiss">Lieu de naissance:</label>
                <input type="text" name="UserLieuNaiss" value="<?php echo $userLieuNaiss;?>" >
                </div>

                <div class="input-field">
                <label for="UserAdresse">Adresse:</label>
                <input type="text" name="UserAdresse" value="<?php echo $userAdresse;?>" >
                </div>

                <div class="input-field">
                <label for="UserNtel">Numero de téléphone:</label>
                
                <?php
                 if(isset($_GET['Modif']))
                 {
                     if($_GET['Modif']=='InvalidPhoneNumber'){
                        
                        ?>
                            <input class="err" type="text" name="UserNtel" value="<?php echo $userNtel;?>" >
                         <?php
                        echo "<p class='error'>Numero de téléphone Invalide </p>";
                     }else{
                        ?>
                        <input  type="text" name="UserNtel" value="<?php echo $userNtel;?>" >
                        <?php
                        }

                 }else{
                     ?>
                     <input  type="text" name="UserNtel" value="<?php echo $userNtel;?>" >
                 <?php
                }
                
                ?>
                </div>

                
                <div class="input-field">
                <label for="UserLieuNaiss">GENRE:</label>
                    <div class="input-field-genre">
                    <?php
                    if( $userGenre==="Homme"){
                    ?>
                        <input type="radio" id="male" name="Genre" value="Homme" checked  />Homme
                        <input type="radio" id="female" name="Genre" value="Femme" />Femme
                    <?php
                    }else{
                    ?>

                        <input type="radio" id="male" name="Genre" value="Homme"  />Homme
                        <input type="radio" id="female" name="Genre" value="Femme" checked/>Femme

                     <?php
                    }
                    ?>
                    </div>
                 </div>

                 <div class="input-field">
                <label for="UserEmail">E-mail:</label>
                <input type="text" name="UserEmail" value="<?php echo $userEmail;?>" >
                <p class="info">"Information de connexion: Seul le patient pourra le modifier"</p>
            </div>

                <div class="input-field">
                <label for="UserUsername">Nom d'utilisateur:</label>
                <input type="text" name="UserUsername" value="<?php echo $userUsername;?>" >
                <p class="info">"Information de connexion: Seul le patient pourra le modifier"</p>
                </div>
                
                 <div class="input-field">
                 <label for="GSang">Groupe sanguin:</label>
        
                <select name="GSang" class="Gsang" >
                <option value="" disabled selected >Groupe sanguin</option>
                <option value="A+" <?php if($userGSang=="A+") echo "selected";?>>A+</option>
                <option value="A-" <?php if($userGSang=="A-") echo "selected";?>>A-</option>
                <option value="O+" <?php if($userGSang=="O+") echo "selected";?>>O+</option>
                <option value="O-" <?php if($userGSang=="O-") echo "selected";?>>O-</option>
                <option value="B+" <?php if($userGSang=="B+") echo "selected";?>>B+</option>
                <option value="B-" <?php if($userGSang=="B-") echo "selected";?>>B-</option>
                <option value="AB+"<?php if($userGSang=="AB+") echo "selected";?>>AB+</option>
                <option value="AB-"<?php if($userGSang=="AB-") echo "selected";?>>AB-</option>
                </select>
                 </div>

                 <div class="input-field">
                     <label for="UserMChron">Maladies Chroniques:</label>
                        <textarea  name="UserMChron" rows="4" cols="50" placeholder="Liste des maladies Chroniques">
                        <?php echo str_replace(array('\n','\r'), array("\n","\r"), $userMChron); ?>     
                        </textarea>
                 </div>
                 
                

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