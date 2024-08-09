<?php 
      include 'fixed/nav.php';
      
      $artikli=dohvatiIzBaze('velicina');
      $kutije=dohvatiIzBaze('kutija');
?>

<div class="main_tittle text-center cene_bg m-auto d-flex justify-content-center novosti_bg">
        <div class="naslov_stranice  w-75 d-flex justify-content-center flex-column">
            <h2 class="w-50 mx-auto naslov_h2">Cene</h2>
           
            </div>
            
</div>
        <div class=" w-100  cenovnik_naslov text-white m-auto d-flex align-items-center justify-content-center my-5">
            <h3 class="Bungee naslov_cenovnik text-white text-center">Sladoledi</h3>
        </div>
        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center">
        <div class="d-flex flex-md-row flex-column justify-content-center align-items-center">
            <img src="../assets/img/article_design_ice_cream.png" width="150" height="150" class="m-3">
        <div class="cene d-flex flex-row justify-content-center align-items-center">
           
            <div class="d-flex flex-column cenovnik_red justify-content-center  ">
                <?php foreach($artikli as $artikal): ?>
                <div class="d-flex flex-row naziv_artikal_cenovnik  ">
            <h4 class="font-Patrick "><?=mb_strtoupper($artikal->naziv)?></h4>
            <i>&nbsp (<?=$artikal->kolicina_ukusa?> ukusa) </i>
            <span>&nbsp <?=$artikal->cena?>din</span>
            </div>
            <?php endforeach ?>
          

            </div>
            
       
            
        </div>
        </div>
        <div class="d-flex flex-md-row flex-column justify-content-center align-items-center">
            <img src="../assets/img/article_design_box1.png" width="150" height="150" class="m-3">
        <div class="cene d-flex flex-row justify-content-center align-items-center">
           
            <div class="d-flex flex-column cenovnik_red justify-content-center  ">
                <?php foreach($kutije as $kutija): ?>
                <div class="d-flex flex-row naziv_artikal_cenovnik  ">
            <h4 class="font-Patrick "><?=mb_strtoupper($kutija->naziv_kutije).' '.$kutija->kolicina_kg?>KG</h4>
            <i>&nbsp (<?=$kutija->kolicina_ukusa?> ukusa) </i>
            <span>&nbsp <?=$kutija->cena?>din</span>
            </div>
            <?php endforeach ?>
          

            </div>
            
       
            
        </div>
        </div>
        </div>
<?php 
include 'fixed/footer.php'
?>