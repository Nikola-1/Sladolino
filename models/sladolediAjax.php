<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $sladoledi=dohvatiIzBaze('sladoledi');
        $json_sladoledi=array();
        $json_sladoledi[]=$sladoledi;
        echo json_encode($json_sladoledi);

?>