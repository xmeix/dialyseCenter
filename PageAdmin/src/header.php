<?php
  
  
  if(!isset($_SESSION)){
    session_start();
    }

   

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styleAdmin.css?v=721" />
    <link rel="stylesheet" href="../../Fontcss/all.min.css">
    <title>Page d'administration</title>
    
  </head>
  <body>


    <div id="side-bar" class="side-bar">
      <div class="logo-container">
        <div class="logo">
          <i id="Menubtn" class="fas fa-bars"></i>
          <a href="#" id="logo" class="logo">Page d'<span>administration</span></a>
        </div>
      </div>
      <div class="menu">
        <ul>
          <li class="element" id="One" data-title-PIM="Page inscription des médecins">
          <i class="fas fa-user-nurse"></i>
          <a class="link" >Page inscription des médecins</a>
          </li>
          <li class="element" id="Seven">
            <i class="fas fa-user-plus" ></i
            ><a class="link"  >Page inscription des patients</a>
          </li>

          <li class="element" id="Two">
            <i class="fas fa-address-card"></i
            ><a class="link" >Gérer  patients</a>
          </li>

          <li class="element" id="Three">
            <i class="fas fa-user-md"></i
            ><a class="link" >Gérer le staff médical</a>
          </li>
          <li class="element" id="Four">
            <i class="fas fa-hospital-user"></i>
            <a class="link" href="#">Demandes D'emplois du temps</a>
          </li>

          <li class="element" id="Eight">
          <i class="fas fa-people-arrows"></i>
            <a class="link"  >Gérer les affectations des patients</a>
          </li>

          <li class="element" id="Five">
            <i class="fas fa-calendar-alt"></i>
            <a class="link" href="#">Gérer les séances de dialyse</a>
          </li>

          <li class="element" id="Six">
            <i class="fas fa-syringe"></i
            ><a class="link" href="#">Gérer L'inventaire</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main">
    <a href="PageAdmin.php" class="PageType">
        <p>Page d'<span>administration</span></p>
      </a>
      <a id="Home" title="Home page" class="Home"><i class="fas fa-home"></i></a>
      <a href="../../src/includes/LogOut_inc.php" class="Déconnexion" >Déconnexion</a>
      <a href="BoiteLettres.php" class="tooltip"><i class="fas fa-bell">
        
      <span class="tooltiptext">Messages reçus</span></i></a>
    </div>
