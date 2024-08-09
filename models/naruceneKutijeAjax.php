<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $lokacije=dohvatiIzBaze('narucene_kutije');
        $json_lokacije=array();
        $json_lokacije[]=$lokacije;
        echo json_encode($json_lokacije);

?>