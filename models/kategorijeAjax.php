<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $kategorije=dohvatiIzBaze('kategorije');
        $json_kategorije=array();
        $json_kategorije[]=$kategorije;
        echo json_encode($json_kategorije);

?>