
 <link rel="stylesheet" href="../css/style.css" />
<form action="includes/SignIn_inc.php" class="sign-in-form" method="post" style="width: 50%;">

                <div class="input-error">
                <div id="user" class="input-field" >
                  <i class="fas fa-user"></i>
                  <input type="text" name="Userormail" placeholder="Nom d'utilisateur/E-mail "  required>
                </div>
                <div id="invalid-username-email">Votre Nom d'utilisateur/E-mail n'est pas valide.</div>
                </div>
                <div class="input-error">
                <div  id="passin" class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="Password" placeholder="Mot de passe"  required>
                </div>

                <div id="invalid-password">votre mot de passe est incorrect.</div>
                 </div>
                <div class="btn"><button type="submit" name="submit">Se connecter</button></div>
              </form>

              <?php


        if(isset($_GET['Error']))
        {
              if($_GET["Error"]=="wrongUseroremail")
              {
                echo "
                    <script>
                    var element = document.getElementById('invalid-username-email');
                    element.style.display='inherit';
                    var element2=document.getElementById('user');
                    element2.classList.add('err');
                    </script>"
                   ;
                   
              } 

              elseif($_GET["Error"]=="wrongPassword")
              {

                echo "
                    <script>
                    var element = document.getElementById('invalid-password');
                    element.style.display='inherit';
                    var element2=document.getElementById('passin');
                    element2.classList.add('err');
                    </script>"
                  ;
                  

              }

        }
?>