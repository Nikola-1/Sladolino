<?php 
        include "../models/setup.php";
        if(!isset($_SESSION['korisnik'])){
                redirect('login.php?dugmeUloguj=true');
        }
        include "fixed/head.php";
        include "fixed/nav.php" ;
        
?>
<?php if(isset($_SESSION['korisnik'])): ?>
<Div id="order_body">
<div class="w-100 order_bg d-flex flex-column justify-content-center align-items-center m-auto" >
    <div class="order_button_wrapper_1 ">
   <div class="order_type">
            <button class="m-1 order_type_button" data-ot="dostava" data-otId='1'>Dostava</button>
            <button class="m-1 order_type_button" data-ot="preuzimanje" data-otId='2'>Preuzimanje</button>
   </div>
    <hr>
   <div class="location_order">
            <button class="m-1 location_order_button" data-city='Beograd'>Beograd</button>
            <button class="m-1 location_order_button" data-city='Novi Sad'>Novi Sad</button>
   </div>
   </div>
   <div class="order_step2 " id="order_step_2"></div>
   <div class="button_order_step_3 my-4">
        <button class="my-4 button_order" id="step3_button">Izaberi kutiju</button>
   </div>
</div>  
</Div>
<div id="overlay" class='loader'>
<div class="d-flex flex-row justify-content-center align-items-center load_wrapp">
<img src='../assets/img/ice-cream3.png' width='100' height='100'>
<p>Loading...</p>
</div>
</div>
<?php endif ?>
<?php if(!isset($_SESSION['korisnik'])){  http_response_code(403);}?>
        
        
<?php 

        include "fixed/footer.php";
?>