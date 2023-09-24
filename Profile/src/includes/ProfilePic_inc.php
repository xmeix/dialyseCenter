<?php
if(!isset($_SESSION)){
    session_start();
    
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//CHECKING EVERYTHING

if(isset($_POST['ajouter-photo'])){
    $img=$_FILES['profile-img'];
    $imgName=$img['name'];
    $imgTmpName=$img['tmp_name'];
    $imgSize=$img['size'];
    $imgError=$img['error'];
    $imgType=$img['type'];


    $imgExt = explode('.', $imgName);//we get two pieces of data
    $imgActualExt = strtolower(end($imgExt));
    $Username = $_SESSION['user_Username'];
    $Id = $_SESSION['user_Id'];
    $allowed=array('jpg','jpeg','png');
    
    if(in_array($imgActualExt,$allowed)){

        if($imgError===0){

            //check file size
            if($imgSize<5000000){

                //create unique id
                $imgNameNew="profile".$Id.".".mt_rand().$imgActualExt;
                $imgDestination= '../uploads/'.$imgNameNew;
                $imgUrl="uploads/".$imgNameNew;
                move_uploaded_file($imgTmpName,$imgDestination);
                include_once "../../../src/includes/DataBaseConn.php";
                $sql="UPDATE ImageP SET ImageP_Etat= ?  , ImageP_Url = ? WHERE ImageP_UserId=?;";
                
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../PageSignUp.php?Error=stmtError");
                    exit();
                }
                $state=0;
                mysqli_stmt_bind_param($stmt,"isi",$state,$imgUrl,$Id);
                mysqli_stmt_execute($stmt);
                $result=mysqli_query($conn,$sql);
          

                
                header("location: ../Profile.php?upload=success");

            }else{
                echo "<p>votre fichier depasse la taille autorisé.</p>";
            }


        }else{
            echo "<p>Erreur de téléchargement!</p>";
        }

    }else{
        echo "<p>votre fichier doit etre une image.</p>";
    }
}