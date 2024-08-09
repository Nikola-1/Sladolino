<?php 


            include "setup.php";
            include "functions.php";
    
            
          
            

       if(isset($_POST["btnProvera"])){
      
      
        $Email=$_POST['Email'];
        
        $Lozinka=$_POST['Lozinka'];
        $hashLozinka=md5($Lozinka);
        $_SESSION['zapamcenaLozinka']=$Lozinka;
        $_SESSION['zapamcenEmail']=$Email;
        if($Email != '' || $Lozinka != ''){
          $ulogovanKorisnik=ulogujKorisnika($Email,$hashLozinka);
          
          
        }
       
        else{
          $ulogovanKorisnik=false;
        }
        if($Email == ''){
          $_SESSION['porukaErrorEmail']='Morate uneti email';
          redirect("../views/login.php?dugmeUloguj=true");
        }
        else if(!dohvatiEmail($Lozinka,$Email)){
          $_SESSION['porukaErrorEmail']='Kredencijali se ne podudaraju';
          redirect("../views/login.php?dugmeUloguj=true");
        }
        else{
          $_SESSION['porukaErrorEmail']='';
          $_SESSION['zapamcenEmail']=$Email;
          redirect("../views/login.php?dugmeUloguj=true");
        }
        if($Lozinka == ''){
          $_SESSION['porukaErrorLozinka']='Morate uneti lozinku';
          redirect("../views/login.php?dugmeUloguj=true");
        }
        else if(!dohvatiLozinku($Lozinka,$Email)){
          $_SESSION['porukaErrorLozinka']='Kredencijali se ne podudaraju';
          redirect("../views/login.php?dugmeUloguj=true");
        }
        else{
          $_SESSION['porukaErrorLozinka']='';
          $_SESSION['zapamcenaLozinka']=$Lozinka;
          redirect("../views/login.php?dugmeUloguj=true");
        }
        
        
      
        if( $ulogovanKorisnik ){
          
            session_start();
            $_SESSION['korisnik']=$ulogovanKorisnik;
         
            redirect("../index.php");
            
        }
        else{
         
            $_SESSION['brPokusaja']+=1;
          
          
           unset($_SESSION['korisnik']);
        }
        echo $_SESSION['brPokusaja'];
      }
      else{
        $_SESSION['ZakljucanNalog']='Nalog je zakljucan';
        redirect("../views/login.php?dugmeUloguj=true");
      }
      
?>