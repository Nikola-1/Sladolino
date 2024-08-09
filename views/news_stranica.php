<?php include "fixed/head.php";
     include "fixed/nav.php";
    
     
     $clanci=dohvatiIzBaze('clanci');
     $kategorije=dohvatiIzBaze('kategorijeclanaka')
     ?>
 
    <div class="main_tittle text-center m-auto d-flex justify-content-center novosti_bg">
    
        <div class="naslov_stranice  w-75 d-flex justify-content-center flex-column">
            <h2 class="w-50 mx-auto naslov_h2">Novosti</h2>
           
            </div>
            
</div>
     <div class=" swiper news">
     <div class="swiper-button-prev"></div>
         <div class="swiper-wrapper Categories d-flex  flex-row align-items-center text-center" id="categoriesArticle">
            <!--Ispisano pomocu ajaxa-->
        
        </div>
        <div class="swiper-button-next"></div>
       
     </div>
     <hr>
     <div id="Novosti"> <!--Ispisano pomocu ajaxa--></div>
    <div class="pagination_Numbers d-flex justify-content-center align-items-center" id="Paginacija">
      
    </div>
<?php include "fixed/footer.php"?>