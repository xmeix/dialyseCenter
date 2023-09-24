
<?php

/*if(isset($_GET['Nom']))

{
  $Nom=$_GET['Nom'];
  echo ' <input type="text" name="Nom" placeholder="Nom" value="'.$Nom.'" > ';
  echo'<br>';

}
else{

 echo ' <input type="text" name="Nom" placeholder="Nom">';
 echo'<br>';
}
*/

?>
<style>
.avant-insc{
  color: rgba(51, 51, 51, 0.87);
  font-size:12px;
  font-weight:500;
  text-align:justify;
  margin-left:3em;
  margin-right:3em;
  margin-top:-1em;
}
</style>

<p class="avant-insc">Pendant l'inscription veuillez s'il vous plait mettre vos informations réelles, sinon votre compte sera supprimé par l'administrateur du centre.</p>

<form action="includes/SignUp_inc.php" class="sign-up-form" method="post">

           <div class="Space">

           <!--NAME INPUT-->
                <div class="input-field">
                    <i class="fas fa-user"></i>
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
                </div>
                <!--PRENOM INPUT-->
                <div class="input-field">
                   <i class="fas fa-user"></i>
                   <?php

                    if(isset($_GET['Prenom']))

                    {
                      $Prenom=$_GET['Prenom'];
                      echo ' <input type="text" name="Prenom" placeholder="Prenom" value="'.$Prenom.'" required> ';

                    }
                    else{

                    echo ' <input type="text" name="Prenom" placeholder="Prenom" required>';

                    }


                    ?>
                </div>
           </div>

           <div class="Space">
            <!--Date de naissance INPUT-->
           <div class="input-field">
               <i class="far fa-calendar-alt"></i>


               <input type="date" name="DateNaiss"
              value="1999-07-12"
              min="1950-01-01"
              max="2018-01-01" >

            </div>

            <!--Lieu de naissance INPUT-->
            <div class="input-field">
             <i class="fas fa-map-marker-alt"></i>
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
            </div>

     </div>
      <!--GENRE INPUT-->
       <div class="input-genre">
              <h5>Genre: </h5>
           
              <input type="radio" id="male" name="Genre" value="Homme" required> Homme
                  <input type="radio" id="female" name="Genre" value="Femme" > Femme
       </div>
      
       <div class="input-error">
                <div class="input-field" id="email">
                  <i class="fas fa-envelope"></i>
                  
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
              </div>
              <div id="invalid-mail">Votre adresse e-mail n'est pas Valide</div>
            </div>
       


       <div class="Space">

       <div class="input-error">
              <div class="input-field" id="ntel">
                <i class="fas fa-phone"></i>
                
                  <?php

                  if(isset($_GET['Ntel']))

                  {
                    $Ntel=$_GET['Ntel'];
                    echo '<input type="text" name="Ntel" placeholder="Numéro téléphone" value="'.$Ntel.'" required>';
                    
                    
                  }
                  else{

                  echo '<input type="text" name="Ntel" placeholder="Numéro téléphone"  required>';

                  }


                  ?>
            </div>
              <div id="invalid-phone-number">Votre numéro de téléphone doit contenir 10 caractéres</div>
            </div>
          
       <div class="input-error">
         <div class="input-field" id="username">
         <i class="fas fa-user"></i>
         <?php

          if(isset($_GET['Username']))

          {
            $Username=$_GET['Username'];
            echo "<input type='text' name='Username'  placeholder='Nom d utilisateur '  value='".$Username."'  required>";
            
            
          }
          else{

          echo "<input type='text' name='Username'  placeholder='Nom d utilisateur '  required>";

          }


          ?>
       </div>
       
              <div id="username-err">Votre Nom d'utilisateur  n'est pas correct</div>
              <div id="UsernameAlreadyExists">Nom d'utilisateur existe deja.</div>
            
            
            </div>
       
       </div>

       <div class="Space">
         
         <div class="input-error">
                <div class="input-field " id="pass">
           <i class="fas fa-lock"></i>
           <input type="password" name="Password" placeholder="Mot de passe"  required>
         </div>
         <div id="pass1">Votre Mot de passe doit Contenir au moins 8 caractères</div>
         <div id="pass2">Votre Mot de passe doit Contenir au moins un chiffre</div>
         <div id="pass3">Votre Mot de passe doit Contenir au moins une lettre Majscule</div>
         <div id="pass4">Votre Mot de passe doit Contenir au moins une lettre Miniscule </div>
         </div>
         <div class="input-error">
            <div class="input-field" id="passinc">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="ConfirmPassword" placeholder="Confirmation MDP"  required>
         
            </div>
            <div id="passIncompat">Les deux mots de passe ne sont pas Compatibles</div>
        </div>

       </div>
       

       <div class="btn" style="margin-top: 1em; float: right; margin-right: 4em;">
       <button type="submit" name="submit" >S'inscrire</button>
       </div>

      </div>
      
       </form>



<?php


if(isset($_GET['Error']))
{
if($_GET["Error"]=="invalidUsername")
{
  echo "
  <script>
   var element = document.getElementById('username-err');

   element.style.display='inherit';
   var element2=document.getElementById('username');
          element2.classList.add('err');
  </script>"
  ;

}

if($_GET["Error"]=="invalidMail")
{
  echo "
  <script>
   var element = document.getElementById('invalid-mail');
   element.style.display='inherit';
   var element2=document.getElementById('email');
          element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="passIncompat")
{
  echo "
  <script>
   var element = document.getElementById('passIncompat');
   element.style.display='inherit';
   var element2=document.getElementById('passinc');
          element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="Pass1")
{
  echo "
  <script>
   var element = document.getElementById('pass1');
   element.style.display='inherit';
   var element2=document.getElementById('pass');
          element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="Pass2")
{
  echo "
  <script>
   var element = document.getElementById('pass2');
   element.style.display='inherit';
   var element2=document.getElementById('pass');
   element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="Pass3")
{
  echo "
  <script>
   var element = document.getElementById('pass3');
   element.style.display='inherit';
   var element2=document.getElementById('pass');
   element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="Pass4")
{
  echo "
  <script>
   var element = document.getElementById('pass4');
   element.style.display='inherit';
   var element2=document.getElementById('pass');
   element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="InvalidPhoneNumber")
{
  echo "
  <script>
   var element = document.getElementById('invalid-phone-number');
   element.style.display='inherit';
   var element2=document.getElementById('ntel');
   element2.classList.add('err');
  </script>"
  ;}

if($_GET["Error"]=="UsernameAlreadyExists")
{
  echo "
  <script>
   var element = document.getElementById('UsernameAlreadyExists');
   element.style.display='inherit';
   var element2=document.getElementById('username');
   element2.classList.add('err');
  </script>"
  ;
}

if($_GET["Error"]=="stmtError")
{
  echo "<p> Reessayer </p>";
}


}
        
       
?>