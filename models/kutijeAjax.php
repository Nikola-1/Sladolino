<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $kutije=dohvatiIzBaze('kutija');
        $json_kutije=array();
        $json_kutije[]=$kutije;
        echo json_encode($json_kutije);

?>