<?php
include 'functions.php';
       session_start();
        $id_slad=$_POST['id_ukus0'];
        $id_slad2=$_POST['id_ukus1'];
        $id_slad3=$_POST['id_ukus2'];
       if(isset($_POST['id_ukus3'])){
        $id_slad4=$_POST['id_ukus3'];
       }
       else{
        $id_slad4=null;
       }
        $id_korisnik=$_POST['korisnik'];
        $id_kutija=$_POST['id_kutija'];
        $kolicina=$_POST['kolicina'];
        $idKutije=dodajNarucenuKutiju($id_slad,$id_slad2,$id_slad3,$id_slad4,$id_korisnik,$id_kutija,$kolicina);
       echo $idKutije;
       if($_SESSION['id_Kutije'] == null){
        $_SESSION['id_Kutije']=[];
       }
      
        array_push($_SESSION['id_Kutije'],$idKutije);
       
       
       

?>
