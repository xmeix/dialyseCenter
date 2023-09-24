<?php 
  if(!isset($_SESSION)){
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../../src/includes/DataBaseConn.php";
$current_user=$_SESSION["user_Id"];
?>
<?php 
         
         

         $sql="SELECT * FROM users WHERE user_Id = '$current_user'";
         $gotResults=mysqli_query($conn,$sql);

         if($gotResults){
           if(mysqli_num_rows($gotResults)>0){
             while($row=mysqli_fetch_array($gotResults)){

              $userType=$row['user_Type'];
              
                           
               ?>
<form action="<?php

if($userType=="Medecin"){
  echo "includes/Parametres2_inc.php";
}elseif($userType=="patient"){
  echo "includes/Parametres_inc.php";
}

?>" class="profile-form" method="POST">


        

               <!--INFO GENERALES-->
        <div class="border">

          <div class="titrediv">
            <p class="titlediv" align="center">Informations générales</p>
            <?php if($userType=="patient"){ ?>
            <h5 class="sous-titlediv">Ces informations peuvent être vues par les médecins , elles forment votre dossier patient.</h5>
            
            <?php } ?>
            </div>
        <div class="Space">
        <div class="input-field ">
        <label for="Nom">Nom:</label>
          <div class="input-field-inside saved">
            <i class="fas fa-user"></i>
             <p ><?php echo $row["user_Nom"]; ?></p>
         </div>
      </div>

      <div class="input-field ">
        <label for="Prenom">Prénom</label>
        <div class="input-field-inside saved">
          <i class="fas fa-user"></i>
       <p ><?php echo $row["user_Prenom"]; ?></p>
        </div>
      </div>
        </div>

        <div class="Space">
        <div class="input-field">
        <label for="DateNaiss">Date de naissance:</label>
        <div class="input-field-inside saved">
          <i class="far fa-calendar-alt"></i>
          <p ><?php echo $row["user_DateNaiss"]; ?></p>
        
      </div>
    </div>

      <div class="input-field">
        <label for="LieuNaiss">Lieu de naissance:</label>
        <div class="input-field-inside saved">
          <i class="fas fa-map-marker-alt"></i>
          <p ><?php echo $row["user_LieuNaiss"]; ?></p>
      </div>
    </div>
    </div>
     <!--GENRE -->
      <div class="input-field genre">
        <label for="Genre">Genre:</label>

              <?php
        if( $row["user_Genre"]==="Homme"){
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

      <?php 
      if($userType==="Medecin"){
        include_once "../../PageAdmin/src/includes/FonctionStaffList_inc.php";
        $gotResults2=GetInfoStaffById($conn,$current_user);
         
           
             while($row2=mysqli_fetch_assoc($gotResults2)){

              $NSS=$row2['NSS'];
              $Sfam=$row2['Situation_Fam'];
              $DateRec=$row2['Date_Recrutement'];



            }

            ?>

            <div class="Space">
            <div class="input-field">
                <label for="Sfam">Situation familiale:</label>
                <div class="input-field-inside saved">
                  <i class="fas fa-child"></i>
                  <p ><?php echo $Sfam; ?></p>
                </div>
            </div>

                <div class="input-field">
                <label for="DateRec">Date de recrutement:</label>
                <div class="input-field-inside saved">
                  <i class="far fa-calendar-alt"></i>
                  <p ><?php echo $DateRec; ?></p>
                  
                </div>
                </div>

                
            </div>
            <div class="input-field">
            <label for="NSS">Numéro sécurité sociale:</label>
                <div class="input-field-inside saved">
                  <i class="fas fa-user-shield"></i>  
                  <p ><?php echo $NSS; ?></p> 
                </div>
            </div>

            
            <?php
      }

      
      if($userType==="patient"){ 

        include_once "../../src/includes/Fonctions_inc.php";

        $Info=GetInfoPatient($conn,$current_user);
        $rowP=mysqli_fetch_assoc($Info);
          
  
        ?>
        
      <div class="Space">
      <!--GROUPE SANGUIN-->
      <div class="input-field">
        <label for="GSang">Groupe sanguin:</label>
        <select name="GSang" class="Gsang" >
                <option value="" disabled selected >Votre groupe sanguin</option>
                <option value="A+" <?php if($rowP['user_GSang']=="A+") echo "selected";?>>A+</option>
                <option value="A-" <?php if($rowP['user_GSang']=="A-") echo "selected";?>>A-</option>
                <option value="O+" <?php if($rowP['user_GSang']=="O+") echo "selected";?>>O+</option>
                <option value="O-" <?php if($rowP['user_GSang']=="O-") echo "selected";?>>O-</option>
                <option value="B+" <?php if($rowP['user_GSang']=="B+") echo "selected";?>>B+</option>
                <option value="B-" <?php if($rowP['user_GSang']=="B-") echo "selected";?>>B-</option>
                <option value="AB+"<?php if($rowP['user_GSang']=="AB+") echo "selected";?>>AB+</option>
                <option value="AB-"<?php if($rowP['user_GSang']=="AB-") echo "selected";?>>AB-</option>
                </select>
      </div>

        <!--Maladies chronique-->
        <div class="input-field ">
        <label for="MChron">Maladies Chroniques:</label>
        
          <textarea  name="MChron" rows="4" cols="50" placeholder="Liste des maladies Chroniques">
                        <?php echo str_replace(array('\n','\r',' '), array("\n","\r"," "), $rowP['user_MChron']); ?>     
                        </textarea>
        
      </div>
    </div>
    <?php

        }
        ?>

    </div>


    <!--Coordonnées-->
    <div class="border">

      <div class="titrediv">
        <p class="titlediv" align="center">Coordonnées</p>
      </div>

        <div class="Space">
        <!--NUM DE TEL-->
        <div class="input-field">
        <label for="Ntel">Numéro de téléphone:</label>
        <div class="input-field-inside">
          <i class="fas fa-phone"></i>
        <input type="tel" name="Ntel" placeholder="Numéro téléphone"  value="<?php echo $row["user_Ntel"]; ?>" required />
        </div>
      </div>
      <!--ADRESSE-->
      <div class="input-field">
        <label for="Adresse">Adresse:</label>
        <div class="input-field-inside">
          <i class="fas fa-envelope"></i>
        <input type="text" name="Adresse" placeholder="Adresse" value="<?php echo $row["user_Adresse"]; ?>" />
      </div>
    </div>
      
      </div>

    </div>

    <!--Informations de compte-->
    <div class="border">
      <div class="titrediv">
        <p class="titlediv" align="center">Informations du compte</p>
        <h5 class="sous-titlediv">Ces informations ne sont accessibles que par vous-meme.</h5>
        
      </div>

      <!--EMAIL-->
    <div class="input-field">
        <label for="Email">E-mail:</label>
        <div class="input-field-inside" id="email">
          <i class="fas fa-user"></i>
        <input
          type="email"
          name="Email"
          placeholder="E-mail"
          value="<?php echo $row["user_Email"]; ?>"
          required
        />
      </div>
    </div>
    <!--USERNAME-->
      <div class="input-field">
        <label for="Username">Nom d'utilisateur:</label>
        <div class="input-field-inside " id="username">
          <i class="fas fa-user"></i>
        <input type='text' name='Username' placeholder="Nom d'utilisateur"
        value="<?php echo $row["user_Username"]; ?>" required>
      </div>
    </div>

      <div class="Space">
       <div class="input-field">
        <label for="Password">Mot de passe:</label>
        <div class="input-field-inside" id="pass" >
          <i class="fas fa-lock"></i>
        <input
          type="password"
          name="Password"
          placeholder="Mot de passe"
          required
        /></div>
       </div>
        <div class="input-field">
          <label for="ConfirmPassword">Confirmer mot de passe:</label>
          <div class="input-field-inside " id="passIncompat">
            <i class="fas fa-lock"></i>
          <input
            type="password"
            name="ConfirmPassword"
            placeholder="Confirmation MDP"
            required
          />
          </div>
        </div>
        </div>

    </div>


               <?php
             }
           }
         }

        ?>




        <!--Buttons-->
        <center>
        <button type="submit" name="Enregistrer">Enregistrer</button>
        <button type="reset" name="Annuler" >Annuler</button>
        </center>
      </form>





      <?php

//MESSAGES D ERREUR
if(isset($_GET['Error']))
{
      if($_GET["Error"]=="invalidUsername")
      {
        echo "<p class='error'> Votre Nom d'utilisateur  n'est pas correct  </p>";
        echo "
        <script>
          var element=document.getElementById('username');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="invalidMail")
      {
        echo "<p  class='error'> Votre adresse e-mail n'est pas Valide</p>";
        echo "
        <script>
          var element=document.getElementById('email');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="passIncompat")
      {
        echo "<p  class='error'> Les deux mots de passe ne sont pas Compatibles </p>";
        echo "
        <script>
          var element=document.getElementById('passIncompat');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="Pass1")
      {
        echo "<p class='error'> Votre Mot de passe doit Contenir au moins 8 caractères  </p>";
        echo "
        <script>
          var element=document.getElementById('pass');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="Pass2")
      {
        echo "<p class='error'>Votre Mot de passe doit Contenir au moins un chiffre   </p>";
        echo "
        <script>
          var element=document.getElementById('pass');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="Pass3")
      {
        echo "<p class='error'>  Votre Mot de passe doit Contenir au moins une lettre Majscule </p>";
        echo "
        <script>
          var element=document.getElementById('pass');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="Pass4")
      {
        echo "<p class='error'> Votre Mot de passe doit Contenir au moins une lettre Miniscule </p>";
        echo "
        <script>
          var element=document.getElementById('pass');
          element.classList.add('err');
        </script>
        ";
      }

      if($_GET["Error"]=="InvalidPhoneNumber")
      {
        echo "<p class='error'> Votre numéro de téléphone doit contenir 10 caractéres  </p>";
      }

      

      if($_GET["Error"]=="stmtError")
      {
        echo "<p class='error'> ERROR 404! </p>";
      }


      if($_GET["Error"]=="none")
      {
        echo "<p  class='success'> Modifications avec succés </p>";
        
      }


}
        
       
?>

