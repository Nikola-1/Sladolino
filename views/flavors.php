<?php 

include "fixed/nav.php";
include "fixed/tittlePages.php";

$ukusi=dohvatiIzBaze('sladoledi');
$kategorije=dohvatiIzBaze('kategorije');

?>
<div id="modalUkusa" class="modalUkusi d-none">
    <div class="bg_modal" id="bg_modal"></div>
    <div class="pop" id="pop"></div>
</div>
<div class="flavours-intro">
    <h1 class="Bungee text-center">Ponude u lokalima</h1>
    <span class="MarckScript underTittle">Pronadjite ukuse</span>
</div>
<?php include "FlavourLocationDDL.php" ?>
<!--Ovde se generisu ukusi -->
<div class="flavours_section">
    <?php include "ukusiKategorije.php"; ?>
    <div class="flavours_list">
        <ul class="list-unstyled " id="ukusIspis">
        <!--IspisAJAX-->
            
        </ul>
    </div>
    <?php if(!isset($_SESSION['korisnik'])): ?>
    <div class="delivery_block ">
        <div class="delivery_wrapp d-flex justify-content-center align-items-center">
    <div class="deliver_link_block">
    <span class="MarckScript underTittle  text-center">Zasto da se cimate?</span>
    <p class="font-Linotte">Odmah porucite svoj omiljeni sladoled klikom na dugme.</p>
    <a href="login.php?dugmeUloguj=true" class="button text-decoration-none">Porucite</a>
    </div>
        <div class="img_cart_block">
    <img src="../assets/img/ice-cream-truck.png" width="150" height="120" >
    </div>
    </div>
    <?php endif ?>
      <?php if(isset($_SESSION['korisnik'])): ?>
    <div class="delivery_block ">
        <div class="delivery_wrapp d-flex justify-content-center align-items-center">
    <div class="deliver_link_block">
    <span class="MarckScript underTittle  text-center">Zasto da se cimate?</span>
    <p class="font-Linotte">Odmah porucite svoj omiljeni sladoled klikom na dugme.</p>
    <a href="order.php" class="button text-decoration-none">Porucite</a>
    </div>
        <div class="img_cart_block">
    <img src="../assets/img/ice-cream-truck.png" width="150" height="120" >
    </div>
    </div>
    <?php endif ?>
</div>
<?php 
include "fixed/footer.php";

?>