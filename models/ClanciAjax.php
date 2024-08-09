<?php 

    
        include 'functions.php';
        header('Content-type: application/json');
        if(isset($_POST['startStr'])){
                echo 'pera';
                $_SESSION['startStranica']=$_POST['startStr'];
                $_SESSION['limitStranica']=$_GET['limit'];
                $_SESSION['kategorijaStranica']=$_GET['category'];
        }
        else{
                $_SESSION['startStranica']=$_GET['start'];
                $_SESSION['limitStranica']=$_GET['limit'];
                $_SESSION['kategorijaStranica']=$_GET['category'];
        }
        
                $clanci=dohvatiBrCl($_SESSION['startStranica'],$_SESSION['limitStranica'],$_SESSION['kategorijaStranica']);
                $json_clanci=array();
                $json_clanci[]=$clanci;
                echo json_encode($json_clanci);
        
     
              /*  $clanci=dohvatiIzBaze('clanci');
                $json_clanci=array();
                $json_clanci[]=$clanci;
                echo json_encode($json_clanci);    */
        
      
?>