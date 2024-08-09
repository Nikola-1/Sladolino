<?php   
    include "setup.php";
        include 'functions.php';
            if(isset($_GET['idZaBrisanje'])){
                $clanakZaBrisanje=$_GET['idZaBrisanje'];
               $obrisano= obrisiClanak($clanakZaBrisanje);
               if($obrisano){
                redirect('../views/admin.php');
               }
            }


        
?>