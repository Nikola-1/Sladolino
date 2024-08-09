<?php  $kategorije=dohvatiIzBaze('kategorije') ?>
<div class="flavors_categories">
        <ul class="list-unstyled ">
            <?php foreach($kategorije as $kategorija): ?>
            <li class="kategorije" data-category='<?=$kategorija->naziv?>'><?= $kategorija->naziv?></li>
            
            <?php endforeach ?>
        </ul>
</div>