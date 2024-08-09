
<?php  $Gradovi=dohvatiIzBaze('gradovi');
        $lokacije=dohvatiIzBaze('lokacije');
        $linkovi=dohvatiIzBaze('navigacija');
?>
<div class="footer_wrap h-100">
    <div class="firstLayer w-100 h-25 text-center">
        <span >SLADOLINO</span>
    </div>
    <div class="secondLayer w-100 h-75 p-5">
        <div class="text_box d-flex flex-md-row flex-column-reverse justify-content-center align-items-start">
            <?php foreach($Gradovi as $grad): ?>
                <div class="footer_text col-md-3 col-12 h-75 font-Linotte text-white">
            <h4 class="Bungee"><?=$grad->naziv?></h4>
                <ul>
                    <?php foreach($lokacije as $lokacija): ?>
                        <?php if($lokacija->id_grad == $grad->id_grad): ?>
                            <?php if(!in_array('views',$path_info)): ?>
                        <li class=" text-white"><a href="views/locations.php" class="lok_nav_footer"><?=$lokacija->naziv_ulice?>&nbsp<?=$lokacija->broj_ulice ?></a></li>
                        <?php endif ?>
                        <?php if(in_array('views',$path_info)): ?>
                        <li class=" text-white"><a href="locations.php" class="lok_nav_footer"><?=$lokacija->naziv_ulice?>&nbsp<?=$lokacija->broj_ulice ?></a></li>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endforeach?>
                       
               
                    
                </ul>
            </div>
                <?php endforeach ?>
            
            
            <div class="footer_text  col-md-3 col-12 h-75 font-Linotte text-white">
            <h4 class="Bungee">Dodatne informacije</h4>
            <ul >
                <?php foreach($linkovi as $link): ?>
                    <?php if(in_array('views',$path_info)): ?>
                    <li class=" text-white"><a class="lok_nav_footer" href="<?=$link->link?>"><?=$link->naziv?></a></li>
                    <?php endif ?>
                    <?php if(!in_array('views',$path_info)): ?>
                    <li class=" text-white"><a class="lok_nav_footer" href="views/<?=$link->link?>"><?=$link->naziv?></a></li>
                    <?php endif ?>
                    <?php endforeach ?>
               
                </ul>
            </div>
            <?php if(!in_array('views',$path_info)):
    
    ?>
            <div class="footer_text col-md-3 col-12 h-75 font-Linotte"><a href="index.php"><img src="assets/img/logo_IceCream - Copy.png" width="100" height="100"></a></div>
            <?php endif ?>
            <?php if(in_array('views',$path_info)):
    
    ?>
            <div class="footer_text col-md-3 col-12 h-75 font-Linotte"><a href="../index.php"><img src="../assets/img/logo_IceCream - Copy.png" width="100" height="100"></a></div>
            <?php endif ?>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php if(!in_array('views',$path_info)):
    
    ?>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<?php endif?>
    <?php if(in_array('views',$path_info)):
    
    ?>
<script src="../assets/js/swiper-bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
<?php endif ?>