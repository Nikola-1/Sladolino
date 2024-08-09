<?php 
session_set_cookie_params(0);
session_start();

                include "functions.php";
        $odgovor1=$_POST['odgovor1'];
        $odgovor2=$_POST['odgovor2'];
        $odgovor3=$_POST['odgovor3'];
         $nizOdg=[$odgovor1,$odgovor2,$odgovor3];
        $kor=$_SESSION['korisnik']->id_korisnik;

        $odgovoreno=daLiJeKorisnikOdgovorio($kor);
   
        if($odgovoreno){
                echo 'vec ste odg';
        }
        else{
               
                if(isset($odgovor1) && isset( $odgovor2) && isset($odgovor3)){
                        foreach($nizOdg as $odg){
                          unesiOdgovoreKorisnika($odg,$kor);
                       
                        }
          }
          echo "<div class='d-flex flex-column justify-content-center align-items-center obavestenje_pitanje'>
          <h3>Hvala vam</h3>
          <div>
                  <b class='text-start'>Vasi odgovori su:</b>
                  <div>
                          <p>Koji ukus vam je omiljen: ".dohvatiOdgovor($odgovor1)->Tekst."</p>
                          <p>Koliko cesto kupujete sladoled: ".dohvatiOdgovor($odgovor2)->Tekst."</p>
                          <p>Da li vise volite sladoled u kornetu ili čašici: ".dohvatiOdgovor($odgovor3)->Tekst."</p>
                  </div>
          </div>
  
          </div>";
        }
        
      
       
?>