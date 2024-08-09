<?php   
    include "setup.php";
        include 'functions.php';
            if(isset($_GET['idZaBrisanje'])){
                $sladZaBrisanje=$_GET['idZaBrisanje'];
               $obrisano= obrisiSladoled($sladZaBrisanje);
               if($obrisano){
                redirect('../views/admin.php');
               }
            }


        
?>