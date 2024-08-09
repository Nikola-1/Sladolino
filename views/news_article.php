<?php  include "fixed/head.php";
include "fixed/nav.php";
 if(isset($_GET['id'])){
        $id=$_GET['id'];
 }
else{
        $id=null;
}

$clanak=dohvatiClanak($id);
?>
<div class="main_tittle text-center m-auto d-flex justify-content-center novosti_bg">
        <div class="naslov_stranice  w-75 d-flex justify-content-center flex-column">
            <h2 class="w-50 mx-auto naslov_h2">Novosti</h2>
           
            </div>
            
</div>
<?php if(isset($_GET['id'])): ?>
<div class="article_wrapp container-fluid m-auto d-flex flex-column justify-content-center align-items-start">
        <div class="article_image d-flex justify-content-center align-items-center">
                <img src="<?=$clanak->slika ?>" class="img-fluid m-5" >
        </div>
        <div class="social_media d-flex ">
        <a class="m-1 text-decoration-none" href="#"><i class="fab fa-facebook-f "></i></a>
        <a class="m-1 text-decoration-none" href="#"><i class="fab fa-twitter "></i></a>
        <a class="m-1 text-decoration-none" href="#"><i class="fab fa-instagram "></i></a>
        </div>
        <div class="article_text align-items-start">
            <h1 class="Bungee"><?=$clanak->naslov ?></h1>
                    <p class="font-Linotte"><?=$clanak->tekst ?></h2>        
</div>

        
</div>
<?php endif ?>
<?php if(!isset($_GET['id'])): ?>
        <h3 class="Bungee d-flex justify-content center align-items-center m-auto"> Doslo je do greske :(</h3>
        <?php endif ?>
<?php include "fixed/footer.php"?>