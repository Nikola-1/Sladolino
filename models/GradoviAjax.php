<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $gradovi=dohvatiIzBaze('gradovi');
        $json_gradovi=array();
        $json_gradovi[]=$gradovi;
        echo json_encode($json_gradovi);

?>