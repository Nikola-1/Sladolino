<?php 

    
        include 'functions.php';
        header('Content-type: application/json');
        
        
        $brojStranica=count(dohvatiIzBaze('clanci'));
       echo $brojStranica;

?>