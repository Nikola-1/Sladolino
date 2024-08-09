<?php 
session_start();
if(isset($_SESSION['korisnik'])){
   
            unset($_SESSION['korisnik']);
            $_SESSION['zapamcenEmail']='';
            $_SESSION['zapamcenaLozinka']='';
            $_SESSION['zapamcenoIme']='';
        $_SESSION['zapamcenoPrezime']='';
        $_SESSION['zapamcenGrad']='';
        $_SESSION['zapamcenaUlica']='';
        $_SESSION['zapamcenBroj']='';
        $_SESSION['zapamcenoKorisnicko_Ime']='';
        $_SESSION['zapamcenEmailRegister']='';
        $_SESSION['zapamcenaLozinkaRegister']='';
            $_SESSION['porukaErrorEmail']='';
            $_SESSION['porukaErrorLozinka']='';
            header("Location: ../views/login.php?dugmeUloguj=true");
        } ?>