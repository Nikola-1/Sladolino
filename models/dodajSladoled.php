<?php 
        include "setup.php";
        include "functions.php";
        if( $_POST['ImeSlad'] != ' ' && is_uploaded_file($_FILES['slikaZaUpload']['tmp_name']) && $_POST['kategorijaSlad'] != 0){
                $target_dir='../assets/img/';
                $target_file = $target_dir . basename($_FILES["slikaZaUpload"]["name"]);
                $tipSlike=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $naziv=$_POST['ImeSlad'];
                $datum= $_POST['datum_izlaska'];
                $slika= basename($_FILES["slikaZaUpload"]["name"]);
                $kategorija=$_POST['kategorijaSlad'];
                echo $kategorija;
               
                
                move_uploaded_file($_FILES['slikaZaUpload']['tmp_name'],$target_file);
                dodajSladoled($naziv,$slika,$datum,$kategorija);
                $_SESSION['nijeUnetaSlika']='';
                redirect('../views/admin.php');
        }
        else{
                $_SESSION['nijeUnetaSlika']='Niste uneli sliku';

                redirect('../views/admin.php');
        }
       
?>