<?php

if (isset($_POST["submit"]))
{
    include_once "DataBaseConn.php";//ON VA SE CONNECTER A la base de données . 
    include_once "Fonctions_inc.php";
    
      $Userormail =mysqli_real_escape_string($conn,$_POST['Userormail']); // $_POST['Nom'];
      $Password =mysqli_real_escape_string($conn,$_POST['Password']);

    
    loginUser($conn,$Userormail,$Password);


} 
else
{
    header("location: ../PageSignUp.php");
    exit();
}