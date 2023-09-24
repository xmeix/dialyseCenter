<?php
  include "header.php";

  if(!isset($_SESSION)){
    session_start();
  
}

$Patient=$_SESSION["user_Id"];  
include_once "../../src/includes/DataBaseConn.php";
include_once "includes/FonctionLastOrd_inc.php";


?>

<section class="Part-Two">
<div class="wrap">

<div class="HistoTr"><?php 
$Type="Traitements";
if(OrdExists($conn,$Patient,$Type)===true){?>
            <p class="title">Historique d'ordonnances de traitements</p>
            <div class="list">
            <ul>
        <?php


        $Type="Traitements";
        $result=GetInfoUserOrd($conn,$Patient,$Type);


        while($row=mysqli_fetch_assoc($result)){

                $Nom=$row['user_Nom'];
                $Prenom=$row['user_Prenom'];
                $OrdId=$row['Ord_Id'];
                $OrdDesc=$row['Ord_Description'];
                $OrdType=$row['Ord_Type'];
                $OrdDate=date('d-m-Y', strtotime($row['Date_Creation']));

                $Medecin=$row['id_Medecin'];
                $res=GetInfoUserMed($conn,$Medecin);
                while($ro=mysqli_fetch_assoc($res)){
                    $NomM=$ro['user_Nom'];
                    $PrenomM=$ro['user_Prenom'];
                }

                ?>
                <a class="l1" title='Voir ordonnance' href="LastOrd.php?OP=Show&OrdId=<?php echo $OrdId; ?>&Type=Traitements"><li>Ordonnance Id N°= <?php echo $OrdId;?>  |Date : <?php echo $OrdDate;?></li></a>
                <?php
                
            }
        ?>
        </ul>
        </div><?php }else{

echo "<p class='Message'>Votre médecin ne vous a pas préscrit une ordonnance de traitements </p>";
}

?> 
</div>



<div class="HistoAn"><?php 
$Type="Analyses";
if(OrdExists($conn,$Patient,$Type)===true){?>
        <p class="title">Historique d'ordonnances d'analyses</p>
        <div class="list">
            <ul>
        <?php


        $Type="Analyses";
        $result=GetInfoUserOrd($conn,$Patient,$Type);


        while($row=mysqli_fetch_assoc($result)){

                $Nom=$row['user_Nom'];
                $Prenom=$row['user_Prenom'];
                $OrdId=$row['Ord_Id'];
                $OrdDesc=$row['Ord_Description'];
                $OrdType=$row['Ord_Type'];
                $OrdDate=date('d-m-Y', strtotime($row['Date_Creation']));

                $Medecin=$row['id_Medecin'];
                $res=GetInfoUserMed($conn,$Medecin);
                while($ro=mysqli_fetch_assoc($res)){
                    $NomM=$ro['user_Nom'];
                    $PrenomM=$ro['user_Prenom'];
                }

                ?>
                <a class="l1" title='Voir ordonnance' href="LastOrd.php?OP=Show&OrdId=<?php echo $OrdId; ?>&Type=Analyses"><li>Ordonnance Id N°= <?php echo $OrdId;?>  |Date : <?php echo $OrdDate;?></li></a>
                <?php

                
            }
        ?>
        </ul>
        </div><?php }else{

    echo "<p class='Message'>Votre médecin ne vous a pas préscrit une ordonnance des analyses </p>";

}?>
</div>



</div>

<?php if(isset($_GET['OP'])){
    if($_GET['OP']="Show"){
        $OId=$_GET['OrdId'];
        $Typ=$_GET['Type'];
        
        


        if($Typ==="Traitements"){
            $resul=getOrd($conn,$OId);

            
        while($row=mysqli_fetch_assoc($resul)){
                
                $N=$row['user_Nom'];
                $P=$row['user_Prenom'];
                $ODesc=$row['Ord_Description'];
                $OType=$row['Ord_Type'];
                $ODate=date('d-m-Y', strtotime($row['Date_Creation']));

                $Med=$row['id_Medecin'];
                $res=GetInfoUserMed($conn,$Med);
                while($ro=mysqli_fetch_assoc($res)){
                   
                    $NM=$ro['user_Nom'];
                    $PM=$ro['user_Prenom'];
                }

               
                
            }
        ?>
        <div class="Ordonnance-fiche">
        <p class="title">ordonnance de traitements n° <?php echo $OId;?> préscrite par votre medecin</p>

        <p class="Deb">RÉPUBLIQUE ALGÉRIENNE DÉMOCRATIQUE ET POPULAIRE <br>
            Centre de dialyse AL AZHAR d'Alger <br>
            <span>Rue Boudjemaa Moghni - Hussein-Dey <br>
            Tél: 021.77.58.22 
        </span>
        </p>
        <p class="second">Hussein Dey,le <?php echo $ODate;?> </p>

        <p class="middle">ORDONNANDE De <?php echo $OType ?></p>
        <p class="info"><span>NOM:</span><?php echo "  ".$N;?> <br>
            <span>PRÉNOM:</span><?php echo "  ".$P;?><br>
            <span>Délivré par le docteur:</span> <?php echo $NM." ".$PM;?><br>
    
        </p>
        <div class="description">
            <?php echo  '<pre>'.str_replace(array('\n','\r'), array("\n","\r"), $ODesc).'<pre>';?>
        </div>
    
        <p class="signature">Signature: <br><span><?php echo $NM." ".$PM;?></span> </p>
        

        
    </div>
            <?php
        }
        if($Typ==="Analyses"){
            
            $result=getOrd($conn,$OId);


        while($row=mysqli_fetch_assoc($result)){

            $N=$row['user_Nom'];
            $P=$row['user_Prenom'];
            $OId=$row['Ord_Id'];
            $ODesc=$row['Ord_Description'];
            $OType=$row['Ord_Type'];
            $ODate=date('d-m-Y', strtotime($row['Date_Creation']));

            $Med=$row['id_Medecin'];
            $res=GetInfoUserMed($conn,$Med);
            while($ro=mysqli_fetch_assoc($res)){
                $NM=$ro['user_Nom'];
                $PM=$ro['user_Prenom'];
            }


               
                
            }
            
            ?>
        
        <div class="Ordonnance-fiche2">

    <p class="title">La derniere ordonnance des analyses préscrite par votre medecin</p>
    
    <p class="Deb">RÉPUBLIQUE ALGÉRIENNE DÉMOCRATIQUE ET POPULAIRE <br>
            Centre de dialyse AL AZHAR d'Alger <br>
            <span>Rue Boudjemaa Moghni - Hussein-Dey <br>
            Tél: 021.77.58.22 
        </span>
        </p>
        <p class="second">Hussein Dey,le <?php echo $ODate;?> </p>

        <p class="middle">ORDONNANDE Des <?php echo $OType ?></p>
        <p class="info"><span>NOM:</span><?php echo "  ".$N;?> <br>
            <span>PRÉNOM:</span><?php echo "  ".$P;?><br>
            <span>Délivré par le docteur:</span> <?php echo $NM." ".$PM;?><br>
    
        </p>
        <div class="description">
            <?php echo  '<pre>'.str_replace(array('\n','\r'), array("\n","\r"), $ODesc).'<pre>';?>
        </div>
    
        <p class="signature">Signature: <br><span><?php echo $NM." ".$PM;?></span> </p>
        

          </div>
<?php }
}
}
?>
</section>




  
<?php
include "footer.php";
?>