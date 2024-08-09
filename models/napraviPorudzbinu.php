<?php 
              session_start();
              include 'setup.php';
                include 'functions.php';
            $Ime=$_POST['Ime'];
            $Prezime=$_POST['Prezime'];
            $Telefon=$_POST['Telefon'];
            $grad=$_POST['id_grad'];
            $korisnik=$_POST['id_korisnik'];
            $Porudzbina=$_POST['tip_Porudzbine'];
            $napomena=$_POST['napomena'];
            $broj;
            $ulica;
            $sprat;
            $interfon;
            $lokacija;
            $datumKreiranja=date('Y-m-d h:i',time());
            $ukupnaCena=$_POST['ukupnaCena'];
            if(isset($_POST['id_lokacija'])){
                $lokacija=$_POST['id_lokacija'];
            }
            else{
                $lokacija=null;
            }
            if(isset($_POST['broj'])){
                $broj=$_POST['broj'];
            }
            else{
                $broj=null;
            }
            if(isset($_POST['ulica'])){
                $ulica=$_POST['ulica'];
            }
            else{
                $ulica=null;
            }
            if(isset($_POST['sprat'])){
                $sprat=$_POST['sprat'];
            }
            else{
                $sprat=null;
            }
            if(isset($_POST['interfon'])){
                $interfon=$_POST['interfon'];
            }
            else{
                $interfon=null;
            }
            $vremeSati=floor($_POST['vreme']/60);
            $vremeMinut=$_POST['vreme']%60;
         
            if($vremeMinut < 10){
                $vremeMinut="0".$vremeMinut;
            }
            if($_POST['napomena'] !=null){
                $napomena =$_POST['napomena'];
                
            }
            else{
                $napomena="";
            }
            $vremeFormat=$vremeSati.":".$vremeMinut;
            $email=$_POST['Email'];
            $telefon=$_POST['Telefon'];
            $NacinPlacanja=$_POST['nacin_Placanja'];
     
            //
            $datum= new DateTime('today');
            
            $razlikaDana=$_POST['dan']-date('w');
            if($_POST['dan'] == 0){
                $razlikaDana =7-date('w');
            }
             $datum->modify('+'.$razlikaDana.'days');
            $formatiranDatum=$datum->format("Y-m-d");
           
            $porudzbina=kreirajPorudzbinu($ulica,$broj,$sprat,$interfon,$Ime,$Prezime,$email,$Telefon,$napomena,$formatiranDatum,$vremeFormat,$grad,$Porudzbina,$NacinPlacanja,$korisnik,$lokacija,$ukupnaCena,$datumKreiranja);
           foreach($_SESSION['id_Kutije'] as $kutija){ 
            spojKutijePorudzbine($kutija,$porudzbina);
            $_SESSION['id_Kutije']=[];
        };
            

            

?>