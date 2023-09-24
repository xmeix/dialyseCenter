<?php
include "header.php";
?>

<section class="PartOne" id="PartOne">
    <p class="titreOne">Page d'inscription des Medecins et des infirmiers</p>
    <div class="container-form-med">
    <form action="includes/PageInscriptionMedecins_inc.php" class="MedForm" method="post">
   
    <div class="First-Part-InsMed">
     <p>Informations personnelles</p>

    <div class="outside-two">
    <div class="label-elemd">
        <label for="Nom">Nom:</label>
        <div class="elemed">
        <?php

                    if(isset($_GET['Nom']))
                    {
                      $Nom=$_GET['Nom'];
                      echo ' <input type="text" name="Nom" placeholder="Nom" value="'.$Nom.'" required> ';

                      
                    }
                    else{

                    echo '<input type="text" name="Nom" placeholder="Nom" required>';

                    }


                    ?>
        <i class="fas fa-user-tie"></i>
        </div>
      </div>
      <div class="label-elemd">
        <label for="Prenom">Prénom:</label>
        
        <div class="elemed">
        <?php

                    if(isset($_GET['Prenom']))

                    {
                      $Prenom=$_GET['Prenom'];
                      echo ' <input type="text" name="Prenom" placeholder="Prénom" value="'.$Prenom.'" required> ';

                    }
                    else{

                    echo ' <input type="text" name="Prenom" placeholder="Prénom" required>';

                    }


                    ?>
        <i class="fas fa-user-tie"></i>
    
    </div>
    </div>
    </div>

          <div class="outside-two">
          <div class="label-elemd">
          <label for="DateNaiss">Date de naissance:</label>
          <div class="elemed">
          <input type="date" name="DateNaiss"
              value="1994-07-22"
              min="1950-01-01"
              max="2001-01-01" >
              <i class="far fa-calendar-alt"></i>
              </div>
              
              </div>

              <div class="label-elemd">
            <label for="LieuNaiss">Lieu de Naissance:</label>
            <div class="elemed">
            <?php

                if(isset($_GET['LieuNaiss']))

                {
                  $LieuNaiss=$_GET['LieuNaiss'];
                  echo '<input type="text" name="LieuNaiss" placeholder="Lieu de Naissance" value="'.$LieuNaiss.'" required>';

                }
                else{

                  echo ' <input type="text" name="LieuNaiss" placeholder="Lieu de Naissance"  required>';

                }


                ?>
                <i class="fas fa-map-marker-alt"></i>    
              </div>
              </div>
              </div>

        <div class="radio-genre">
        <label for="Genre">Genre:</label>
        <input type="radio" id="male" name="Genre" value="Homme" required checked> Homme
        <input type="radio" id="female" name="Genre" style="margin-left:1em" value="Femme"> Femme
        </div>
    
        <div class="outside-two">
                <div class="label-elemd">
                <label for="Sfam">Situation familiale:</label>
                <div class="elemed">
                <input type="text" name="Sfam" placeholder="Situation familiale"  required>
                <i class="fas fa-child"></i>  
                </div>
                </div>

                    <div class="label-elemd">
                          
                    <label for="NSS">Numéro sécurité sociale:</label>
                    <div class="elemed">
                    <input type="text" name="NSS" placeholder="Numéro sécurité sociale"  required>
                    <i class="fas fa-user-shield"></i>    
                    </div>
                    </div>
       </div>
       <div class="outside-two">
                <div class="label-elemd">
                <label for="Ntel">Numéro de téléphone:</label>
                <div class="elemed">
                <input type="text" name="Ntel" placeholder="Numéro téléphone"  required>
                <i class="fas fa-phone-alt"></i>    
                </div>
                </div>

              
                              <div class="label-elemd">
                                <label for="Email">E-mail:</label>
                                <div class="elemed">
                                  <?php

                                      if(isset($_GET['Email']))

                                      {
                                        $Email=$_GET['Email'];
                                        echo '<input type="email" name="Email" placeholder="E-mail" value="'.$Email.'"  required>';

                                      }
                                      else{

                                      echo ' <input type="email" name="Email" placeholder="E-mail"  required>';

                                      }


                                      ?>
                                  
                                  
                                  <i class="fas fa-at"></i>    
                                    </div>
                                  </div>
              
       </div>

       <div class="outside-two">
          <div class="label-elemd">
          <label for="DateRec">Date de recrutement:</label>
          <div class="elemed">
          <input type="date" name="DateRec"
              value="2016-07-22"
              max="2030-01-01"
              min="2010-01-01" required>
              <i class="far fa-calendar-alt"></i>
              </div>
              
              </div>
                    <div class="label-elemd">
                          
                    <label for="Type" >Type:</label>
                    <div class="elemed">
                    <select id="TypeIns" name="Type"  onChange="MedInfCheck();" required>
                    <option value="">Médecin ou Infirmier?</option>
                    <option value="Medecin" id="Med">Médecin</option>
                    <option value="Infirmier">Infirmier</option>
                    </select>
                    </div>
                    </div>
        </div>
        

    
                

            </div>

        <div class="ifMed" id="ifMed">
        <p>Informations du compte</p>

            <label for="Username">Nom d'utilisateur:</label>

            <div class="elemed">
            <input type='text' name='Username' id='username' placeholder="Nom d'utilisateur " >
            <i class="fas fa-user"></i>
            </div>

            <div class="outside-two">
              <div class="label-elemd">
                <label for="Password">Mot de passe:</label>
                <div class="elemed">
                <input type="password" name="Password" id="password" placeholder="Mot de passe" >
                <i class="fas fa-lock"></i>        
              </div>
              </div>
              <div class="label-elemd">
            <label for="ConfirmPassword">Confirmer Mot de passe:</label>
            <div class="elemed">
            <input type="password" name="ConfirmPassword" id="confirmpassword" placeholder="Confirmation MDP"  >
            <i class="fas fa-unlock"></i>
            </div>
            </div>
              </div>

        </div>
        <center>
            <div class="buttonsMed">
              <button type="submit" name="Ajouter">Ajouter</button>
              <button type="reset"  name="Annuler">Annuler</button>
            </div>
            <div class="message">

                  <?php
                  if(isset($_GET['Error']))
                  {
                  if($_GET["Error"]=="invalidUsername")
                  {
                   ?> 

                   <div class="error">Votre nom d'utilisateur n'est pas valide.</div>

                   <?php


                  }

                  if($_GET["Error"]=="invalidMail")
                  {
                    ?> 
                   <div class="error">Votre e-mail n'est pas valide.</div>

                   <?php
                  }

                  if($_GET["Error"]=="passIncompat")
                  {
                    ?> 
                    <div class="error">Vos mots de passes ne sont pas compatibles.</div>

                   
                   <?php
                  }

                  if($_GET["Error"]=="Pass1")
                  {
                    ?> 
                    <div class="error">votre mot de passe doit contenir au moins 8 caracteres.</div>

                   
                   <?php
                  }

                  if($_GET["Error"]=="Pass2")
                  {
                    ?> 
                    <div class="error">votre mot de passe doit contenir au moins un chiffre.</div>

                   
                   <?php
                  }

                  if($_GET["Error"]=="Pass3")
                  {
                    ?> 
                    <div class="error">votre mot de passe doit contenir au moins une majuscule.</div>

                   
                   <?php
                  }

                  if($_GET["Error"]=="Pass4")
                  {
                    ?> 
                    <div class="error">votre mot de passe doit contenir au moins une minuscule .</div>

                   
                   <?php
                  }

                  if($_GET["Error"]=="InvalidPhoneNumber")
                  {
                    
                    ?> 
                    <div class="error">Numéro de téléphone pas valide.</div>

                   
                    <?php
                  }
                  if($_GET["Error"]=="invalidNSS")
                  {
                    
                    ?> 
                    <div class="error">Numéro de sécurité sociale pas valide.</div>

                   
                    <?php
                  }

                  if($_GET["Error"]=="UsernameAlreadyExists")
                  {
                    ?> 
                    <div class="error">Votre nom d'utilisateur Existe deja.</div>

                   
                   <?php
                  }

                

                  if($_GET["Error"]=="InfirmierAdded")
                  {
                    ?> 
                    <div class="success">Ajout Infirmier avec succés.</div>

                   <?php
                  }

                  if($_GET["Error"]=="MedecinAdded")
                  {
                    ?> 
                    <div class="success">Ajout Médecin avec succés.</div>

                   <?php
                  }


                  }
                          
                        
                  ?>
        </div>
    </center>

    


    </form>
    </div>
</section>



<?php
include "footer.php";
?>