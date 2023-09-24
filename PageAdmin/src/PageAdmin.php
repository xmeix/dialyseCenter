<?php
  include "header.php";
  
  if(!isset($_SESSION)){
    session_start();
    }
?>

<section class="wrap-all">
    <a href="PageInscriptionMedecins.php" class="one">
        <p class="text">Inscrire votre staff médical</p>
        <i class="fas fa-user-plus"></i>
        <div class="description">Pour une meilleure gestion de votre centre de dialyse, l'inscription de votre staff médical medecins et infermiers est nécessaire.</div>
        
    </a>
    <a href="ListeStaff.php" class="two">
    <p class="text">opérations médecins</p>
    <i class="fas fa-user-md"></i>
    <p class="info">Vous trouverez ici les profiles de votre staff médical et vous pouvez aussi gérer leurs fiches de paies.</p>
    </a>

    <a href="GestionDemEdt.php" class="three">
      <p class="text">Gérer demandes d'emplois de dialyse</p>
      <p class="description">Accepter ou refuser les demandes reçus de la part des patients</p>
      <i class="far fa-bell"></i>
     
    </a>
    <a href="SeancesEdt.php" class="four">
      <p class="text">gérer les seances de dialyse</p>
      <p class="description">Ajouter les seances de dialyse pour un patient en lui affectant un médecin , consulter l'emplois de dialyse des patients </p>
      
      <i class="fas fa-procedures"></i>
      
    </a>
    <a href="Fourniture.php" class="five">
    <p class="text">voir l'inventaire</p>
    <p class="info">Ajouter , supprimer ou consulter le materiel du centre avec possibilité de modification de la quantité</p>
    <i class="fas fa-microscope"></i>
    
    </a>
    <a href="ListePatients.php" class="six">
    <p class="text">opérations patients</p>
    <p class="info">Vous trouverez ici les informations des patients et vous pouvez aussi gérer leurs factures.</p>
    <i class="fas fa-user-injured"></i>
    
    </a>
</section>
<?php
include "footer.php";
?>




<style>

.Picture {
  

  background-size:100% 100%;
  overflow:hidden;
  
}
</style>