<?php 

    
        include 'functions.php';
        header('Content-type: application/json');

        $korisnici=dohvatiIzBaze('korisnik');
        
        echo json_encode($korisnici);

?>