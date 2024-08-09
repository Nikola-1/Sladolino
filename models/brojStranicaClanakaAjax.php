<?php 

    
        include 'functions.php';
        header('Content-type: application/json');
        
        
        $brojStranica=count(dohvatiIzBaze('clanci'))/3;
       echo $brojStranica;

?>