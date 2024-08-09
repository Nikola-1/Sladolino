<div class="modal_wrapp d-none justify-content-center align-items-center w-100 h-100" id="modal_map">
<div class="bg_modal" id="map"></div>
<div class="pop m-auto  h-50 d-flex  align-items-center justify-content-center" >
   
    <div class="d-flex flex-lg-row flex-column-reverse align-items-center justify-content-center bg-white" >
    <div class="location_map_list">
                <?php foreach($gradovi as $grad): ?>
                <h2 class="Bungee text-start"><?=$grad->naziv?></h2>
                
                <ul>
                <?php foreach($prodavnice as $prodavnica): ?>
                    <?php if($prodavnica->id_grad == $grad->id_grad): ?>
                    <li class="lokacijaJS" id="lok<?=$prodavnica->id_lokacija?>"><?=$prodavnica->naziv_ulice?></li>
                    <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <?php endforeach ?>
               
         
               <button id="mapaIzlaz" class="order_button">Izađi</button>
            </div>
<div class="Google_map" >
                <div id="mapTiler"></div>
            </div>
            
            </div>
           
        </div>
        
        </div>