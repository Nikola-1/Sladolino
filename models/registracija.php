<?php       include "../models/setup.php";
            include "functions.php";
            if(isset($_POST['registerSubmit'])){

           
        $Ime=$_POST['Ime'];
        
        $Prezime=$_POST['Prezime'];
        $Grad=$_POST['Grad'];
        $Ulica=$_POST['Ulica'];
        $Broj=$_POST['Broj'];
        $Korisnicko_Ime=$_POST['korisnickoIme'];
        $Email=$_POST['Email'];
        $Lozinka=$_POST['Lozinka'];
        $DrugaLozinka=$_POST['Lozinka2'];
        
        $hashLozinka=md5($Lozinka);
        $status=$_POST['status'];
        $regExIme="/[A-Z]{1}[a-z]{2,12}/";
        $regExPrezime="/[A-Z]{1}[a-z]{2,12}/";
        $regExUlica="/\w+(\s\w+){1,}/";
        $regExBroj="/[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}/";
        $regExKorisnickoIme="/^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/";
        $regExEmail="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
        $regExLozinka="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
        $_SESSION['zapamcenoIme']=$Ime;
        $_SESSION['zapamcenoPrezime']=$Prezime;
        $_SESSION['zapamcenGrad']=$Grad;
        $_SESSION['zapamcenaUlica']=$Ulica;
        $_SESSION['zapamcenBroj']=$Broj;
        $_SESSION['zapamcenoKorisnicko_Ime']=$Korisnicko_Ime;
        $_SESSION['zapamcenEmailRegister']=$Email;
        $_SESSION['zapamcenaLozinkaRegister']=$Lozinka;
        var_dump(pronadjiEmail('dndjuric73@gmail.com'));
        $_SESSION['KorisnikVecPostoji']='';
        if(preg_match($regExIme,$Ime) && preg_match($regExPrezime,$Prezime) && $Grad != '' && preg_match($regExBroj,$Broj) && preg_match($regExUlica,$Ulica) && preg_match($regExKorisnickoIme,$Korisnicko_Ime) && filter_var($Email, FILTER_VALIDATE_EMAIL) && preg_match($regExLozinka,$Lozinka) && $Lozinka==$DrugaLozinka){
            if(!pronadjiEmail($Email) ){
                $unosKorisnika =dodajKorisnika($Ime,$Prezime,$Korisnicko_Ime,$Grad,$Ulica,$Broj,$Email,$hashLozinka,$status);
                $_SESSION['KorisnikVecPostoji']='';
                
            }
            else{
                $unosKorisnika=false;
                $_SESSION['KorisnikVecPostoji']='Korisnik sa unetim emailom već postoji.';
               
            }
           

        }
            else{
                $unosKorisnika= false;
            }
            
        //validacija podataka
        if(!preg_match($regExIme,$Ime)){
            $_SESSION['RegistracijaImeError']='Ime mora sadrzati veliko slovo,bez brojeva.';
             redirect("../views/register.php");
        }
       
     else{
        $_SESSION['RegistracijaImeError']='';
       redirect("../views/register.php");
     }
     if(!preg_match($regExPrezime,$Prezime)){
        $_SESSION['RegistracijaPrezimeError']='Prezime mora poceti velikim slovom';
     redirect("../views/register.php");
    }
   
 else{
    $_SESSION['RegistracijaPrezimeError']='';
   redirect("../views/register.php");
 }
        if(!preg_match($regExBroj,$Broj)){
            $_SESSION['RegistracijaBrojError']='Morate uneti ispravan broj,primer:+3812345613';
            redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaBrojError']='';
       redirect("../views/register.php");
        }
        if(!preg_match($regExUlica,$Ulica)){
            $_SESSION['RegistracijaUlicaError']='Morate uneti ispravan naziv ulice. Primer:grocanska 12';
             redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaUlicaError']='';
         redirect("../views/register.php");
        }
        if(!preg_match($regExKorisnickoIme,$Korisnicko_Ime)){
            $_SESSION['RegistracijaKorisnickoImeError']='Morate uneti ispravno korisnicko ime.Minimum 8 karaktera';
             redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaKorisnickoImeError']='';
         redirect("../views/register.php");
        }

        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['RegistracijaEmailError']='Morate uneti ispravan email. ';
             redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaEmailError']='';
         redirect("../views/register.php");
        }
        if(!preg_match($regExLozinka,$Lozinka)){
            $_SESSION['RegistracijaLozinkaError']='Lozinka mora sadržati jedno veliko slovo,minimum 8 karaktera i jedan broj. ';
             redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaLozinkaError']='';
         redirect("../views/register.php");
        }
        if($Grad == ''){
            $_SESSION['RegistracijaGradError']='Morate uneti grad';
             redirect("../views/register.php");
        }

        else{
        $_SESSION['RegistracijaGradError']='';
        redirect("../views/register.php");
        }
        if($Lozinka != $DrugaLozinka){
              $_SESSION['LozinkeSeNePoklapaju']='Niste uneli ispravnu lozinku'; 
              redirect("../views/register.php");
        }
        else{
            $_SESSION['LozinkeSeNePoklapaju']=''; 
             redirect("../views/register.php");
        }
        if($unosKorisnika){
             redirect("../views/login.php?dugmeUloguj=true");
        }
       
    }
    else{
        http_response_code(403);
    }
?>