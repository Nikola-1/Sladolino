<?php 
$pitanja=dohvatiIzBaze('pitanja');

?>
<?php if(isset($_SESSION['korisnik'] )): if( !daLiJeKorisnikOdgovorio($_SESSION['korisnik']->id_korisnik)): ?>
<div id="carouselExampleIndicators" class="carousel slide pitanja" data-bs-ride="carousel">
    
  
 
<div class="text-block mx-auto">
        <h3 class="text-center Bungee naslov_h3">Anketa</h3>
      </div>
            <div class=" m-auto my-5 d-flex flex-md-row flex-column justify-content-center align-items-center ">
            
     
      <div class="pitanje">
      
      <div class="pitanje_sadrzaj">
        
            <form class="pitanja_forma" method="POST" id="myform">
                  <?php foreach($pitanja as $pitanje): 
                        $odgovori=dohvatiOdgovorePitanja($pitanje->id_pitanje);
                        
                        ?>
                  <div>

            <i class="fas fa-caret-down text-pitanje strelica"></i>
    <label class='font-Linotte text-pitanje'><?=$pitanje->Tekst?></label>
    
                <div class="odgovor m-3">
                  <Div class="d-flex align-items-center justify-content=center">
                
    </Div>
    <select class="pitanja_ddl">
            <?php foreach($odgovori as $odgovor): ?>
                  
                <option id="odgovor<?=$odgovor->id_odgovor?>" dataidOdg='<?=$odgovor->id_odgovor?>'><?=$odgovor->Tekst?></option>  
                 
                
                <?php endforeach ?>
    </select>
    </div>
    </div>
      <?php endforeach ?>
 
                  <input type="submit" class="button">
            </form>
           <div id="form_output"></div>
      </div>
      </div>


          
      </div>
      </div>
    <?php endif ?>
    <?php endif ?>
    

 
  
