<?php include "fixed/head.php"; 
        include "fixed/nav.php";
        if($_SESSION['korisnik']->status_id ==1): 
        $sladoledi=dohvatiIzBaze('sladoledi');
        $kategorije=dohvatiIzBaze('kategorije');
        $clanci=dohvatiIzBaze('clanci');
        $clKategorije=dohvatiIzBaze('kategorijeclanaka');
        $tabele=dohvatiBaze();
        
        ?>
       
<div class="flavors_categories">
        <ul class="list-unstyled ">
            <?php foreach($tabele as $tabela): ?>
            <li class="kategorije" data-category='<?=$tabela->TABLE_NAME?>'><?= $tabela->TABLE_NAME?></li>
            
            <?php endforeach ?>
        </ul>
</div>
         <h3 class="text-braon Bungee">Ukusi</h3>
        <form action="../models/dodajSladoled.php" method="POST" enctype="multipart/form-data" class="formaUnosSlad">
            <Div class="">
            <input type="text" class="upload_input" name="ImeSlad" placeholder="naziv sladoleda" class="m-3">
            <input type="hidden" class="upload_input" name="datum_izlaska" value="<?=date('Y-m-d h:i:s')?>"  placeholder="slika">
            <div class="d-flex flex-column m-3">
                <div class="d-flex ">
                <label for='imgUpload' class="button_order labelUpload">Unesi sliku</label>
                <img id="picturePrev" src="#" width="50px" height="50px" class="d-none">
            <input type="file" id='imgUpload' name="slikaZaUpload" class="upload_file_slad"  placeholder="slika">
            </div>
            <?php if(isset($_SESSION['nijeUnetaSlika'])): ?>
            <p><?=$_SESSION['nijeUnetaSlika']?></p>
            <?php endif ?>
            </div>
            <select name="kategorijaSlad"  class="m-3 upload_input">
                <option value="0">Izaberite kategoriju</option>
                <?php foreach($kategorije as $kategorija):?>
                            <option value="<?=$kategorija->id_kategorija?>"><?=$kategorija->naziv?></option>
                    <?php endforeach ?>

            </select>
            </Div>
            <button type="submit" class="button_order m-3">Unesi sladoled</button>
        </form>
                <table>
                    <th>Ime</th>
                    <th>Slika</th>
                    <th></th>
                <?php foreach($sladoledi as $sladoled): ?>
                    <tr>
                        <td><?=$sladoled->naziv?></td>
                        <td><img src="../assets/img/<?=$sladoled->slika?>" width="50" height="50"></td>
                        <td><?=dohvatiKategoriju($sladoled->kategorija_id)->naziv?></td>
                        <td ><a href="../models/obrisiSladoled.php?idZaBrisanje=<?=$sladoled->id_sladoled?>">Obrisi</a></td>
                    </tr>
                    
                    <?php endforeach ?>
                </table>
                <h3 class="text-braon Bungee">Clanci</h3>
                <form action="../models/dodajClanak.php" method="POST" enctype="multipart/form-data" class="formaUnosSlad">
            <Div class="d-flex flex-column">
            <input type="text" class="upload_input" name="naslovClanka" placeholder="naslov članka" class="m-3">
            <textarea name="tekstClanka" placeholder="sadrzaj clanka" class="upload_input w-50" cols="20" rows="10"></textarea>
            <input type="hidden" class="upload_input" name="datum_objave" value="<?=date('Y-m-d h:i:s')?>"  placeholder="slika">
      
            <div class="d-flex flex-column m-3">
                <div class="d-flex ">
                <label for='imgUploadClanak' class="button_order labelUpload">Unesi sliku</label>
                <img id="picturePrev2" src="#" width="50px" height="50px" class="d-none">
                <div>
                <label for="linkUpload" class="button_order">Unesi link</label>
            </div>
            <input type="file" id='imgUploadClanak' name="slikaZaUpload" class="upload_file_slad"  placeholder="slika">
            <input type="text" id='linkUpload' name="linkZaUpload" class="upload_input"  placeholder="slika">
            </div>
            
            <?php if(isset($_SESSION['nisteUneliSlikuClanka'])): ?>
            <p><?=$_SESSION['nisteUneliSlikuClanka']?></p>
            <?php endif ?>
            </div>
           
            <select name="kategorijaClanak"  class="m-3 upload_input">
                <option value="0">Izaberite kategoriju</option>
                <?php foreach($clKategorije as $clKat):?>
                    <?php if($clKat->naziv !='Sve'): ?>
                            <option value="<?=$clKat->id_kategorija_clanka?>"><?=$clKat->naziv?></option>
                            <?php endif ?>
                    <?php endforeach ?>

            </select>
            </Div>
            <button type="submit" class="button_order m-3">Unesi sladoled</button>
        </form>

                <table class="clanciTabela">
                    <th>Naslov</th>
                    <th>tekst</th>
                    <th>slika</th>
                    <th>datum</th>
                    <th>kategorija</th>
                <?php foreach($clanci as $clanak): ?>
                    <tr class="m-3">
                        <td><?=$clanak->naslov?></td>
                        <td class="w-50"><?=$clanak->tekst?></td>
                        <td><img src="<?=$clanak->slika?>" width="100" height="80"></td>
                        <td><?=$clanak->datum?></td>
                        <td><?=dohvatiKategorijuClanka($clanak->id_kategorija)->naziv?></td>
                       
                        <td ><a href="../models/obrisiClanak.php?idZaBrisanje=<?=$clanak->id_clanak?>">Obrisi</a></td>
                       
                    </tr>
                    
                    <?php endforeach ?>
                </table>
                <?php else:?>
                    <h3 class="text-center Bungee m-5">Ne možete pristupiti ovoj stranici</h3>
<?php endif ?>

<?php include "fixed/footer.php"; ?>