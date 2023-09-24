<?php

function InsererChampsFourniture($conn,$NomFourn,$QteFourn){

    $sql = "INSERT INTO Fournitures ( Fourniture_nom,Fourniture_quantité) VALUES (?,?);";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../Fourniture.php?Error=stmtError1");
                    exit();
                }

                mysqli_stmt_bind_param($stmt,"si",$NomFourn,$QteFourn);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
               
}

function AfficheFournitures($conn){

    $sql = "SELECT * FROM Fournitures;";
    $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../Fourniture.php?Error=stmtError2");
                    exit();
                }

                mysqli_stmt_execute($stmt);
               $result=mysqli_stmt_get_result($stmt);
               return $result;
                mysqli_stmt_close($stmt);
               
}


function FourniExists($conn,$NomFourn){

    $sql="SELECT * FROM Fournitures WHERE Fourniture_nom  = ? ;";
    
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Fourniture.php?Error=stmtError3");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$NomFourn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;

    }else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function AddQteF($conn,$IdF,$QteF){
    $QteF=$QteF+1;

    $sql="UPDATE Fournitures  SET Fourniture_quantité=? WHERE Fourniture_id  = ? ;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Fourniture.php?Error=stmtError4");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ii",$QteF,$IdF );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    

}
function RemQteF($conn,$IdF,$QteF){
    if($QteF>0){
    $QteF=$QteF-1;
}

    $sql="UPDATE Fournitures  SET Fourniture_quantité=? WHERE Fourniture_id  = ? ;";


    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Fourniture.php?Error=stmtError5");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ii",$QteF,$IdF );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    
}

function DelF($conn,$IdF){

    $sql="DELETE FROM Fournitures WHERE Fourniture_id =?;";

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../Fourniture.php?Error=stmtError6");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$IdF );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


