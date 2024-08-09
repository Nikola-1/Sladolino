<?php 
        
       
        $path2=$_SERVER['REQUEST_URI'];
        $path_info2= explode('/',$path2);
        if(in_array("views",$path_info2) ||in_array("models",$path_info2)){
            include "../data/db_connector.php";
        }

        else{
            include "data/db_connector.php";
        }
     
        
        function dohvatiClanak($id){
            global $conn;
        
            $upit="SELECT * FROM clanci WHERE id_clanak=:id";
            $podaci=$conn->prepare($upit);
            $podaci->bindParam(":id",$id);
            $podaci->execute();
            $rezultat=$podaci->fetch();
            return $rezultat;
        }
        function dohvatiBrojClankova($limit){
            global $conn;
        
            $upit="SELECT * FROM clanci order by RAND() LIMIT :limit";
            $podaci=$conn->prepare($upit);
            $podaci->bindParam(":limit",$limit,PDO::PARAM_INT);
          
            $podaci->execute();
            
            $rezultat=$podaci->fetchAll();
            return $rezultat;
        }
        function dohvatiBrCl($start,$limit,$categorie){
            global $conn;
            switch($categorie){
                case 4:  $upit="SELECT * FROM clanci LIMIT :start,:limit ";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":limit",$limit,PDO::PARAM_INT);
                $podaci->bindParam(":start",$start,PDO::PARAM_INT);
             
                break;
                default:  $upit="SELECT * FROM clanci where id_kategorija=:categorie LIMIT :start,:limit ";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":limit",$limit,PDO::PARAM_INT);
                $podaci->bindParam(":start",$start,PDO::PARAM_INT);
                $podaci->bindParam(":categorie",$categorie);
            }
            
          
            $podaci->execute();
            
            $rezultat=$podaci->fetchAll();
            return $rezultat;
        }
        function dohvatiIzBaze($tabela){
            global $conn;
            
            $upit="SELECT * from $tabela";
            
            $podaci=$conn->query($upit);
  
            $podaci->execute();
            $rezultat=$podaci->fetchAll();
            return $rezultat;
            
        }
        function dohvatiLinkove(){
            global $conn;
            
            $upit="SELECT * from navigacija";
            
            $podaci=$conn->query($upit);
  
            $podaci->execute();
            $rezultat=$podaci->fetchAll();
            return $rezultat;
            
        }
        function dohvatiProdavnice(){
            global $conn;
            $upit="SELECT * from gradovi g inner join  lokacije l on g.id_grad=l.id_grad inner join radno_vreme rv on l.id_radno_vreme = rv.id_radno_vreme ";
            $podaci=$conn->query($upit);
            $podaci->execute();
            $rezultat=$podaci->fetchAll();
            return $rezultat;
        }
        function dohvatiSladoledProdavnice($idGrad,$naziv_ul){
                global $conn;
                $upit='SELECT s.* FROM lokacije l inner join sladoled_lokacija sl on l.id_lokacija=sl.id_lokacija inner join sladoledi s on s.id_sladoled=sl.id_sladoled where l.id_grad=:id_grad and l.naziv_ulice=:naziv_ul  ';
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id_grad",$idGrad);
                $podaci->bindParam(":naziv_ul",$naziv_ul);
                $podaci->execute();
                $rezultat=$podaci->fetchAll();
                return $rezultat;
        }
        function dohvatiOdgovorePitanja($idPitanje){
            global $conn;
                $upit='SELECT o.* FROM odgovori o inner join odgovori_pitanja op on o.id_odgovor=op.id_odgovor inner join pitanja p on p.id_pitanje=op.id_pitanje where op.id_pitanje=:pitanje ';
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":pitanje",$idPitanje);
                
                $podaci->execute();
                $rezultat=$podaci->fetchAll();
                return $rezultat;
        }

        function dodajKorisnika($Ime,$Prezime,$korIme,$Grad,$Ulica,$Broj,$Email,$Lozinka,$Status){
            global $conn;
            $upit="INSERT INTO korisnik(ime,prezime,korisnicko_ime,grad,ulica,broj,Email,Lozinka,status_id) VALUES (:Ime,:Prezime,:kor_ime,:Grad,:Ulica,:Broj,:Email,:Lozinka,:status_id)";
            $podaci=$conn->prepare($upit);
            $podaci=$conn->prepare($upit);
        $podaci->bindParam(":Ime",$Ime);
        $podaci->bindParam(":Prezime",$Prezime);
        $podaci->bindParam(":kor_ime",$korIme);
        $podaci->bindParam(":Grad",$Grad);
        $podaci->bindParam(":Ulica",$Ulica);
        $podaci->bindParam(":Broj",$Broj);
        $podaci->bindParam(":Email",$Email);
        $podaci->bindParam(":Lozinka",$Lozinka);
        $podaci->bindParam(":status_id",$Status);
        $podaci->execute();

        return $podaci;
        }
        function ulogujKorisnika($Email,$Lozinka){
            global $conn;
            $upit="SELECT * from korisnik where Email=:Email and Lozinka=:Lozinka";
            $podaci=$conn->prepare($upit);
            $podaci=$conn->prepare($upit);
        $podaci->bindParam(":Email",$Email);
        $podaci->bindParam(":Lozinka",$Lozinka);
        $podaci->execute();
            $rezultat=$podaci->fetch();
        return $rezultat;
        }
        function pronadjiEmail($Email){
            global $conn;
            $upit="SELECT Email from korisnik where Email=:Email";
            $podaci=$conn->prepare($upit);
        $podaci->bindParam(":Email",$Email);
        $podaci->execute();
        
         $rezultat=$podaci->fetch();
         return $rezultat;
        }
        function dodajNarucenuKutiju($id1,$id2,$id3,$id4,$id_korisnik,$id_kutija,$kolicina){
            global $conn;
            switch($id4){
                case null:$upit= "INSERT INTO narucene_kutije(id_slad,id_slad2,id_slad3,id_korisnik,id_kutija,kolicina) values(:id_slad,:id_slad2,:id_slad3,:id_korisnik,:id_kutija,:kolicina)";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id_slad",$id1);
                $podaci->bindParam(":id_slad2",$id2);
                $podaci->bindParam(":id_slad3",$id3);
                $podaci->bindParam(":id_korisnik",$id_korisnik);
                $podaci->bindParam(":id_kutija",$id_kutija);
                $podaci->bindParam(":kolicina",$kolicina);
                $podaci->execute();
                break;
                default:$upit= "INSERT INTO narucene_kutije(id_slad,id_slad2,id_slad3,id_slad4,id_korisnik,id_kutija,kolicina) values(:id_slad,:id_slad2,:id_slad3,:id_slad4,:id_korisnik,:id_kutija,:kolicina)";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id_slad",$id1);
                $podaci->bindParam(":id_slad2",$id2);
                $podaci->bindParam(":id_slad3",$id3);
                $podaci->bindParam(":id_slad4",$id4);
                $podaci->bindParam(":id_korisnik",$id_korisnik);
                $podaci->bindParam(":id_kutija",$id_kutija);
                $podaci->bindParam(":kolicina",$kolicina);
                $podaci->execute();
            }
  
            return $conn->lastInsertId();
          
            
        }
        
    
       function dohvatiLozinku($lozinka,$Email){
                global $conn;
                $upit="SELECT lozinka FROM korisnik where Lozinka =:lozinka and Email=:email";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":lozinka",$lozinka);
                $podaci->bindParam(":email",$Email);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
       }
       function dohvatiEmail($lozinka,$Email){
        global $conn;
        $upit="SELECT Email FROM korisnik where Lozinka =:lozinka and Email=:email";
        $podaci=$conn->prepare($upit);
        $podaci->bindParam(":lozinka",$lozinka);
        $podaci->bindParam(":email",$Email);
        $podaci->execute();
        $rezultat=$podaci->fetch();
        return $rezultat;
}
            function kreirajPorudzbinu($ulica,$broj,$sprat,$interfon,$Ime,$Prezime,$Email,$Telefon,$napomena,$dan,$vreme,$id_grad,$id_vrstaPor,$id_placanje,$id_korisnik,$id_lok,$UkupnaCena,$datumKreiranja){
                global $conn;
                echo $id_vrstaPor;
                switch($id_vrstaPor){
                    case 1:$upit="INSERT INTO narudzbina(ulica,broj,sprat,interfon,Ime,Prezime,Email,Telefon,napomena,dan,vreme,id_grad,id_vrsta,id_placanje,id_korisnik,ukupna_cena,datum_kreiranja) values(:ulica,:broj,:sprat,:interfon,:Ime,:Prezime,:Email,:Telefon,:napomena,:dan,:vreme,:grad,:vrsta,:placanje,:korisnik,:ukupna,:datumKr)";
                    $podaci=$conn->prepare($upit);
                    $podaci->bindParam(":ulica",$ulica);
                    $podaci->bindParam(":broj",$broj);
                    $podaci->bindParam(":sprat",$sprat);
                    $podaci->bindParam(":interfon",$interfon);
                    $podaci->bindParam(":Ime",$Ime);
                    $podaci->bindParam(":Prezime",$Prezime);
                    $podaci->bindParam(":Email",$Email);
                    $podaci->bindParam(":Telefon",$Telefon);
                    $podaci->bindParam(":napomena",$napomena);
                    $podaci->bindParam(":dan",$dan);
                    $podaci->bindParam(":vreme",$vreme);
                    $podaci->bindParam(":grad",$id_grad);
                    $podaci->bindParam(":vrsta",$id_vrstaPor);
                    $podaci->bindParam(":placanje",$id_placanje);
                    $podaci->bindParam(":korisnik",$id_korisnik);
                    $podaci->bindParam(":ukupna",$UkupnaCena);
                    $podaci->bindParam(":datumKr",$datumKreiranja);
                    $podaci->execute();
                  
                    break;
                    case 2:$upit="INSERT INTO narudzbina(Ime,Prezime,Email,Telefon,napomena,dan,vreme,id_grad,id_vrsta,id_placanje,id_korisnik,id_lokacija,ukupna_cena,datum_kreiranja) values(:Ime,:Prezime,:Email,:Telefon,:napomena,:dan,:vreme,:grad,:vrsta,:placanje,:korisnik,:lokacija,:ukupna,:datumKr)";
                    $podaci=$conn->prepare($upit);
                    $podaci->bindParam(":Ime",$Ime);
                    $podaci->bindParam(":Prezime",$Prezime);
                    $podaci->bindParam(":Email",$Email);
                    $podaci->bindParam(":Telefon",$Telefon);
                    $podaci->bindParam(":napomena",$napomena);
                    $podaci->bindParam(":dan",$dan);
                    $podaci->bindParam(":vreme",$vreme);
                    $podaci->bindParam(":grad",$id_grad);
                    $podaci->bindParam(":vrsta",$id_vrstaPor);
                    $podaci->bindParam(":placanje",$id_placanje);
                    $podaci->bindParam(":korisnik",$id_korisnik);
                    $podaci->bindParam(":lokacija",$id_lok);
                    $podaci->bindParam(":ukupna",$UkupnaCena);
                    $podaci->bindParam(":datumKr",$datumKreiranja);
                    $podaci->execute();
                    break;
                    default:$upit="";
                }
        
                return $conn->lastInsertId();
            }
            function spojKutijePorudzbine($IdKutije,$IdPorudzbine){
                global $conn;
                $upit="INSERT INTO kutije_narudzbine(id_porucena_kutija,id_porudzbina) values(:idK,:idP)";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":idK",$IdKutije);
                $podaci->bindParam(":idP",$IdPorudzbine);
                $podaci->execute();
            }
            function dohvatiPorudzbineKorisnika($idKorisnik){
                global $conn;
                $upit="SELECT * FROM narudzbina n  INNER JOIN korisnik k ON n.id_korisnik=k.id_korisnik where n.id_korisnik=:korisnik";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":korisnik",$idKorisnik);
                $podaci->execute();
                return $podaci->fetchAll();
                $rezultat=$podaci;
                return $rezultat;
            }
            function dohvatiPorudzbineKorisnika2($idKorisnik){
                global $conn;
                $upit="SELECT * FROM narudzbina n INNER JOIN korisnik k ON n.id_korisnik=k.id_korisnik where n.id_korisnik=:korisnik";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":korisnik",$idKorisnik);
                $podaci->execute();
                return $podaci->fetchAll();
                $rezultat=$podaci;
                return $rezultat;
            }
            function dohvatiUkus($id){
                global $conn;
               $upit= "SELECT * from sladoledi where id_sladoled=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function dohvatiKutiju($id){
                global $conn;
               $upit= "SELECT * from kutija where id_kutija=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function dohvatiPlacanje($id){
                global $conn;
               $upit= "SELECT * from placanje where id_placanje=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function dohvatiVrstuPorudzbine($id){
                global $conn;
               $upit= "SELECT * from vrste_narudzbina where id_vrsta=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function dohvatiLokaciju($id){
                global $conn;
               $upit= "SELECT * from lokacije where id_lokacija=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function dohvatiGrad($id){
                global $conn;
               $upit= "SELECT * from gradovi where id_grad=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
                $podaci->execute();
                $rezultat=$podaci->fetch();
                return $rezultat;
            }
            function unesiOdgovoreKorisnika($odgovorId,$korisnik){
                    global $conn;
                    $upit="INSERT INTO odgovori_korisnika(id_odgovor,id_korisnik) values(:odg,:kor)";
                    $podaci=$conn->prepare($upit);
                    $podaci->bindParam(":odg",$odgovorId);
                    $podaci->bindParam(":kor",$korisnik);
                    $podaci->execute();
            }
            function dohvatiOdgovor($id){
                global $conn;
                $upit= "SELECT * from odgovori where id_odgovor=:id";
                 $podaci=$conn->prepare($upit);
                 $podaci->bindParam(":id",$id);
                 $podaci->execute();
                 $rezultat=$podaci->fetch();
                 return $rezultat;
            }
            function daLiJeKorisnikOdgovorio($idKor){
                global $conn;
                $upit= "SELECT id_korisnik from odgovori_korisnika where id_korisnik=:id";
                 $podaci=$conn->prepare($upit);
                 $podaci->bindParam(":id",$idKor);
                 $podaci->execute();
                return $podaci->fetch();
                
            }
            function dohvatiKategoriju($idKat){
                global $conn;
                $upit= "SELECT * from kategorije where id_kategorija=:id";
                 $podaci=$conn->prepare($upit);
                 $podaci->bindParam(":id",$idKat);
                 $podaci->execute();
                return $podaci->fetch();
                
            }
            function obrisiSladoled($idSlad){
                global $conn;
                $upit="DELETE FROM  sladoledi where id_sladoled=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$idSlad);
               return $podaci->execute();
              
            }
            function dodajSladoled($naziv,$slika,$datum,$kategorija){
                global $conn;
                $upit="INSERT INTO sladoledi(naziv,slika,datum_izlaska,kategorija_id) values(:naziv,:slika,:datum,:kategorija)";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":naziv",$naziv);
                $podaci->bindParam(":slika",$slika);
                $podaci->bindParam(":datum",$datum);
                $podaci->bindParam(":kategorija",$kategorija);
                $podaci->execute();
            }
            function dohvatiKategorijuClanka($idkats){
                global $conn;
                $upit= "SELECT * from kategorijeclanaka where id_kategorija_clanka=:id";
                 $podaci=$conn->prepare($upit);
                 $podaci->bindParam(":id",$idkats);
                 $podaci->execute();
                return $podaci->fetch();
            }
            function dodajClanak($naslov,$sadrzaj,$slika,$datum,$kategorija){
                global $conn;
                $upit="INSERT INTO clanci(naslov,tekst,slika,datum,id_kategorija) values(:naslov,:tekst,:slika,:datum,:kat)";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":naslov",$naslov);
                $podaci->bindParam(":tekst",$sadrzaj);
                $podaci->bindParam(":slika",$slika);
                $podaci->bindParam(":datum",$datum);
                $podaci->bindParam(":kat",$kategorija);
                $podaci->execute();
            }
            function obrisiClanak($id){
                global $conn;
                $upit="DELETE FROM  clanci where id_clanak=:id";
                $podaci=$conn->prepare($upit);
                $podaci->bindParam(":id",$id);
               return $podaci->execute();
            }
            function dohvatiBaze(){
                global $conn;
                $upit="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='sladolino' ";
                $podaci=$conn->query($upit);
                $podaci->execute();
                $rezultat=$podaci->fetchAll();
                return $rezultat;
            }
?>