<?php 
  if(!isset($_SESSION)){
    session_start();
    
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
?>


<?php 
include_once "../../src/includes/DataBaseConn.php";

$Username = $_SESSION['user_Username'];
$sql="SELECT * FROM ImageP WHERE ImageP_UserUsername = '$Username' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    
        if($row['ImageP_Etat'] == 0)//theres already an image
        {
            $source= $row["ImageP_Url"];
            echo '<div >';
            ?>
            <style>
                .wrapper{
                background:url('<?php echo $source; ?>') no-repeat;
                
            }
            </style>
            <?php
            //echo "<img class='avatar' src='$source'>";
            echo '</div>';

        }else {
           
            echo '<section class="profile-picture" align="center">';
            $source="../../media/avataravatar.svg";
            ?>
            <style>
                .wrapper{
                background:url('<?php echo $source; ?>') no-repeat;
                
                }
            </style>
            <?php
            
           echo '</section>';

        }
    


}
?>




<form action="includes/ProfilePic_inc.php" method="POST" enctype="multipart/form-data" align="center">
    <div class="wrapper">
        
        <input type="file" class="my-img" name="profile-img"><br>

    </div>
    <p class="USERP"> @<?php echo $_SESSION["user_Username"];?></p><br>
    <button class="btn-photo" type="submit" name="ajouter-photo">Ajouter une photo personnelle</button>

</form>


<style>

.btn-photo{
    padding:0.5em;
    width:30%;
    font-size:13px;
    font-weight:500;
    margin-top:-3em;
}
.USERP{
    font-weight:500;
    font-size:20px;
    letter-spacing:5px;
    
}

.wrapper {
  height: 150px;
  width: 150px;
  position: relative;
  border: 1px solid black;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  margin: auto auto 1em auto;
  
  background-size:100% 100%;
  overflow:hidden;
  
}
</style>