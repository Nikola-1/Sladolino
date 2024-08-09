<?php
        $gradovi=dohvatiIzBaze('gradovi');
        $lokacije=dohvatiIzBaze('lokacije');
        

?>
<div class="flavours_location">
    <div class="button_flavours d-flex  ">
        <div class="text-flavours  mx-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <span class="locationSelected Bungee" id="Town">Beograd</span>
            <span class="addressSelected font-Linotte" id="address">Adresa</span>
            <div class="arrow" id="arrow">

        </div>
            </div>
            
        </div>
        
    </div>
    
    <hr>
  
    <div class="list-unselected " id="loc_unselected">
                        <ul class="w-75">
                            <?php foreach($gradovi as $grad):?>
                           <?php foreach($lokacije as $lokacija): ?>
                            <?php if($lokacija->id_grad == $grad->id_grad): ?>
                            <li class="d-flex justify-content-between align-items-center lokacija" data-lokacija='<?=$grad->naziv?>' data-idLok='<?=$grad->id_grad?>'  data-adresa='<?=$lokacija->naziv_ulice?>'>
                                <p class="location  Bungee" ><?=$grad->naziv?></p> 
                                <p class="address font-Linotte" ><?=$lokacija->naziv_ulice?></p>
                            </li>
                            <?php endif ?>
                            <?php endforeach ?>
                            <?php endforeach ?>
                        </ul>
            </div>

</div>