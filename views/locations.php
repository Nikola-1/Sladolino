<?php 
    include "fixed/head.php";
    include "fixed/nav.php";
   
   
    $prodavnice=dohvatiProdavnice();
    $gradovi =dohvatiIzBaze('gradovi');
    $radno_vreme=dohvatiIzBaze('radno_vreme');
    include "popModal.php";
    
?>




<div class="main_tittle text-center m-auto d-flex justify-content-center  lokacije_bg">
        <div class="naslov_stranice w-75 d-flex justify-content-center flex-column">
            <h2 class="w-50 mx-auto naslov_h2">Lokacije</h2>
           
            </div>
            
</div>
<div class="location_wrapp my-5">
<?php foreach($gradovi as $grad): ?>
<div class="lokacije d-flex flex-lg-row flex-column ">

    <div class="tittle_location ">
        <h1><?=$grad->naziv ?></h1>
        
    </div>
    <div class="locations_info w-100 ">
    <?php foreach($prodavnice as $prodavnica): ?>
        <?php if($prodavnica->id_grad == $grad->id_grad): ?>
    <div class="locations  w-100 ">
        <div class="d-flex align-items-center justify-content-between locations_info_location_wrapp">
        <Div class="locations_info_wrapp ">
        <h2 class="font-Linotte"><?=$prodavnica->naziv_ulice?></h2>
        <Div class="d-flex locations_basic_info">
        <p class="m-1">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#fbbb3e" stroke-width="1.5" stroke-linecap="round"/>
<path d="M15 18H9" stroke="#fbbb3e" stroke-width="1.5" stroke-linecap="round"/>
</svg>
        <?=$prodavnica->naziv_ulice.' '.$prodavnica->broj_ulice?></p>
        <p class="m-1">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20 14C20 17.7712 20 19.6569 18.8284 20.8284C17.6569 22 15.7712 22 12 22C8.22876 22 6.34315 22 5.17157 20.8284C4 19.6569 4 17.7712 4 14V10C4 6.22876 4 4.34315 5.17157 3.17157C6.34315 2 8.22876 2 12 2C15.7712 2 17.6569 2 18.8284 3.17157C20 4.34315 20 6.22876 20 10" stroke="#fbbb3e" stroke-width="1.5" stroke-linecap="round"/>
<path d="M15 19H9" stroke="#fbbb3e" stroke-width="1.5" stroke-linecap="round"/>
</svg> 
        <?=$prodavnica->telefon?></p>
        </Div>
        <div class="d-flex locations_working_info">
            <?php foreach($radno_vreme as $rv): ?>
                <?php if($prodavnica->id_radno_vreme == $rv->id_radno_vreme): ?>
        <strong>RADNO VREME <?=substr($rv->pocetak,0,strpos($rv->pocetak,":")).'h-'.substr($rv->kraj,0,strpos($rv->kraj,":")).'h'?> &nbsp</strong>
        <?php endif ?>
        <?php if($prodavnica->id_radno_vreme_dostave == $rv->id_radno_vreme): ?>
        <strong>DOSTAVA <?=substr($rv->pocetak,0,strpos($rv->pocetak,":")).'h-'.substr($rv->kraj,0,strpos($rv->kraj,":")).'h'?></strong>
        <?php endif ?>
        <?php endforeach ?>
        </div>
        </Div>
        <div class="location" id="modal_pop<?=$prodavnica->id_lokacija?>">
<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#972c0f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#972c0f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
        </div>
        </div>
    <hr>
    
    </div>
    <?php endif ?>
    <?php endforeach ?>
    
    </div>
    
</div>
<?php if($grad != end($gradovi)): ?>
<hr class="mx-5">
<?php endif ?>
<?php endforeach ?>

</div>
<?php include "fixed/footer.php" ?>
</div>


