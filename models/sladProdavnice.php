<?php 

    
        include 'functions.php';
        header('Content-type: application/json');
        session_start();
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $_SESSION['id_session']=$id;
        }
   
        if(isset($_POST['adresaLok'])){
            $adresa=$_POST['adresaLok'];
            $_SESSION['location_session']=$adresa;
        }
      
      
        $sladoledi=dohvatiSladoledProdavnice($_SESSION['id_session'],$_SESSION['location_session']);
        $json_sladoledi=array();
        $json_sladoledi[]=$sladoledi;
        echo json_encode($json_sladoledi);

?>