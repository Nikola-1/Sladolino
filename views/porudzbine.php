<?php 
            include "fixed/head.php";
            include "fixed/nav.php";
        $porudzbine=dohvatiPorudzbineKorisnika($_SESSION['korisnik']->id_korisnik);

        $PR=dohvatiIzBaze("narudzbina");
        
        $kutijePorudzbine=dohvatiIzBaze('kutije_narudzbine');
        $naruceneKutije=dohvatiIzBaze('narucene_kutije');
?>
<div class="PorudzbineKorisnik">
    <?php if(count($porudzbine) != 0): ?>
            <h3 class="Bungee text-center m-3">Porudžbine</h3>
            <?php  foreach($porudzbine as $porudzbina):  ?>
                <Div class="d-flex flex-md-row flex-column justify-content-start align-items-center">
                <span class="Bungee text-braon ime_vrste_dostave" ><?=dohvatiVrstuPorudzbine($porudzbina->id_vrsta)->naziv?></span>
                <span class="datum_kreiranja_porudzbine Bungee text-braon"><?=$porudzbina->datum_kreiranja?></span>
                </Div>
                <hr class="imeDostave_linija">
                <div class="tabelaPorudzbine_wrapp">
           <table class="tabelaPorudzbine">
                
                <th class="Bungee p-2 text-center">Kutija</th>
                <th class="Bungee p-2 text-center">Gramaža</th>
                <th class="Bungee p-2 text-center">Ukus1</th>
                <th class="Bungee p-2 text-center">Ukus2</th>
                <th class="Bungee p-2 text-center">Ukus3</th>
                <th class="Bungee p-2 text-center">Ukus4</th>
                <th class="Bungee p-2 text-center">količina</th>
                <th class="Bungee p-2 text-center">cena</th>
                
                
                <tr class="borderPorudzbina">
                    
                <?php foreach($kutijePorudzbine as $kp): ?>
                    <?php if($kp->id_porudzbina==$porudzbina->id_narudzbina): ?>
                <tr class="text-center">
             
             
                     <?php foreach($naruceneKutije as $nk): ?> 
                        
                        <?php if($nk->id_porucena_kutija == $kp->id_porucena_kutija):  ?>
                            <td> <span class="Bungee text-braon"> <?=dohvatiKutiju($nk->id_kutija)->naziv_kutije?></span></td>
                        <td><span class="Bungee text-braon"> <?=dohvatiKutiju($nk->id_kutija)->kolicina_kg*1000 ?>gr</span>   </td>
                            <td><img src="../assets/img/<?=dohvatiUkus($nk->id_slad)->slika?>"  width="50" height="50">
                <p class="font-Linotte text-center" ><?=dohvatiUkus($nk->id_slad)->naziv?></p></td> 
                <td><img src="../assets/img/<?=dohvatiUkus($nk->id_slad2)->slika?>" width="50" height="50">
                <p class="font-Linotte"><?=dohvatiUkus($nk->id_slad2)->naziv?></p></td> 
                <td><img src="../assets/img/<?=dohvatiUkus($nk->id_slad3)->slika?>" width="50" height="50">
                <p class="font-Linotte"><?=dohvatiUkus($nk->id_slad3)->naziv?></p></td> 
                <?php if($nk->id_slad4 !=null): ?>
                <td><img src="../assets/img/<?=dohvatiUkus($nk->id_slad4)->slika?>" width="50" height="50">
                <p class="font-Linotte"><?=dohvatiUkus($nk->id_slad4)->naziv?></p></td> 
                <?php else: ?>
                    <td><i class="fas fa-times"></i></td>
                <?php endif ?>
                <td><p class="font-Linotte"><?=$nk->kolicina?></p></td>
                     <td> <p class="font-Linotte"><?=$nk->kolicina*dohvatiKutiju($nk->id_kutija)->cena?>.00 RSD</p></td>
                    <?php endif ?>
                  
                    <?php endforeach ?> 
                      
                
                  
                </tr>
                <?php endif ?>
                
                <?php endforeach ?>
                
               
          
                
            </table>
            </div>
            <?php if(dohvatiVrstuPorudzbine($porudzbina->id_vrsta)->naziv == 'Preuzimanje'): ?>
            <div class="informacije">
                    <h3 class=" Bungee">Narucilac</h3>
                    <table class="tabelaPoruciocInfo">
                        <tr>
                            <th>Ime Prezime</th>
                            <th>Grad</th>
                            <th>Mesto preuzimanja</th>
                            <th>Email</th>
                            <th>Dan i vreme preuzimanja</th>

                            <th>način plaćanja</th>
                            <th>Ukupna cena</th>
                        </tr>
                        <tr>
                            <td><span><?=$porudzbina->Ime ?> <?=$porudzbina->Prezime ?></span></td>
                            <td><span><?=dohvatiGrad($porudzbina->id_grad)->naziv ?></span></td>
                            <td><span><?=dohvatiLokaciju($porudzbina->id_lokacija)->naziv_ulice ?> <?=dohvatiLokaciju($porudzbina->id_lokacija)->broj_ulice ?></span></td>
                            <td>    <span> <?=$porudzbina->Email ?></span></td>
                            <td>   <span> <?=$porudzbina->dan?> <?=$porudzbina->vreme?></span></td>
                            <td><span><?=dohvatiPlacanje($porudzbina->id_placanje)->naziv?> </span></td>
                            <td><span><?=$porudzbina->ukupna_cena?>.00 RSD</span></td>
                        </tr>
                    </table>
                   
               </div>
               <?php elseif(dohvatiVrstuPorudzbine($porudzbina->id_vrsta)->naziv == 'Dostava'): ?>
                <div class="informacije">
                    <h3 class=" Bungee">Narucilac</h3>
                    <table class="tabelaPoruciocInfo">
                        <tr>
                            <th>Ime Prezime</th>
                            <th>Grad</th>
                            <th>Ulica</th>
                            <th>sprat i interfon</th>
                            <th>Email</th>
                            <th>Dan i vreme dostave</th>
                            <th>način plaćanja</th>
                            <th>Ukupna cena</th>
                        </tr>
                        <tr>
                            <td><span><?=$porudzbina->Ime ?> <?=$porudzbina->Prezime ?></span></td>
                            <td><span><?=dohvatiGrad($porudzbina->id_grad)->naziv ?></span></td>
                            <td><span><?=$porudzbina->ulica ?> <?=$porudzbina->broj ?></span></td>
                           
                            <td>    <span><?=$porudzbina->sprat ?>, <?=$porudzbina->interfon ?></span></td>
                            <td>    <span> <?=$porudzbina->Email ?></span></td>
                            <td>   <span> <?=$porudzbina->dan?> <?=$porudzbina->vreme?></span></td>
                            <td><span><?=dohvatiPlacanje($porudzbina->id_placanje)->naziv?> </span></td>
                            <td><span><?=$porudzbina->ukupna_cena?>.00 RSD</span></td>
                        </tr>
                    </table>
                    
               </div>
               <?php endif ?>
               <div class="napomena">
                <h4 class="Bungee  text-braon">Napomena</h4>
                <?php if($porudzbina->napomena != null): ?>
                <span class="font-Linotte"><?=$porudzbina->napomena?></span>
                <?php else: ?>
                    <span class="font-Linotte">Nema napomene</span>
                <?php endif?>
               </div>
            <?php endforeach ?>
            <!--Dinamicka-->
            <?php else: ?>
            <h3 class="naslov_h3 Bungee text-braon text-center nemaPorudzbina">Nema porudzbina</h3>
                <?php endif?>
</div>


<?php include "fixed/footer.php"; ?>