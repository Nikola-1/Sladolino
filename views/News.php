<?php 
        $clanciHome=dohvatiBrojClankova(2);
        
?>

<div class="  text-center d-flex flex-column justify-content-center align-items-center"><h3 class="naslov_h3  Bungee">Novosti</h3><p class="MarckScript underTittle">Iz sveta sladoleda</p></div>
<div class="box-wrapp d-flex justify-content-center ">

<?php foreach($clanciHome as $clanak):
        $stariFormat=strtotime($clanak->datum);
        $noviFormat = date('Y/m/d H:i', $stariFormat);
        ?>
<Div class="news_stories_home m-2 d-flex flex-column align-items-center">
<a href="views/news_article.php?id=<?=$clanak->id_clanak ?>" class="news_info_home mx-4 d-flex flex-column justify-content-start text-decoration-none">        
<Div class="news_image_home">
        <?php if(str_starts_with($clanak->slika,'https://')): ?>
                <img src="<?=substr($clanak->slika,strpos($clanak->slika,"../"))?>">
                <?php else: ?>
                        <img src="assets/img/<?=$clanak->slika?>"/> <!--"substr($clanak->slika,strpos($clanak->slika,"..")+1)" za slucaj ako se ubaci slika sa interneta -->
                <?php endif ?>
        </Div>
       
        <div >
        <span class="font-Linotte text-black"><?=$noviFormat ?></span>
            <h2><?=$clanak->naslov ?></h2>
            
            <p class="text-black"><?=$clanak->tekst?></p>
        </div>
        </a>
     </Div>
     <?php endforeach ?>
     

</div>