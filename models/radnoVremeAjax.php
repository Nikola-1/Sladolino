<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $radno_vreme=dohvatiIzBaze('radno_vreme');
        $json_rvreme=array();
        $json_rvreme[]=$radno_vreme;
        echo json_encode($json_rvreme);

?>