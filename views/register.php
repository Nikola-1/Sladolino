<?php 
        include "../models/setup.php";
        include "fixed/head.php";
        include "fixed/nav.php" ;

  
            
        if(isset($_SESSION['zapamcenoIme'])){
          $zIme= $_SESSION['zapamcenoIme'];
        $zPrezime=$_SESSION['zapamcenoPrezime'];
        $zGrad=$_SESSION['zapamcenGrad'];
        $zUlica=$_SESSION['zapamcenaUlica'];
        $zBroj=$_SESSION['zapamcenBroj'];
        $zKorIme=$_SESSION['zapamcenoKorisnicko_Ime'];
        $zEmail=$_SESSION['zapamcenEmailRegister'];
        $zLozinka=$_SESSION['zapamcenaLozinkaRegister'];

        }
        else{
            $zIme='';
            $zPrezime='';
            $zGrad='';
            $zUlica='';
            $zBroj='';
            $zKorIme='';
            $zEmail='';
            $zLozinka='';
        }
         
        
?>
<div class="w-100 order_bg d-flex justify-content-center align-items-center m-auto">
    
    <div class="order_stage1 m-auto my-3 p-lg-5 d-flex flex-column justify-content-center w-100 align-items-start align-items-lg-center">
        <form action="../models/registracija.php" class="w-50"  method="POST" id="registracija">
            <h3 class="Bungee text-center">Registracija</h3>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input w-100 w-lg-50 d-flex flex-column m-3">
                <label>Ime</label>
                <input type="text" name="Ime" value='<?=$zIme?>'>
                <?php if(isset($_SESSION['RegistracijaImeError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaImeError']?></p>
                    <?php endif ?>
                </div>
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label>Prezime</label>
                <input type="text" name="Prezime" value='<?=$zPrezime?>'>
                <?php if(isset($_SESSION['RegistracijaPrezimeError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaPrezimeError']?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label>Grad</label>
                <input type="text" name="Grad" value='<?=$zGrad?>'>
                <?php if(isset($_SESSION['RegistracijaGradError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaGradError']?></p>
                    <?php endif ?>
                </div>
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label>Ulica</label>
                <input type="text" name="Ulica" value='<?=$zUlica?>'>
                <?php if(isset($_SESSION['RegistracijaUlicaError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaUlicaError']?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input  w-100 w-lg-50 d-flex flex-column  justify-content-start m-3">
                <label>Broj</label>
                <input type="text" name="Broj" value='<?=$zBroj?>'>
                <?php if(isset($_SESSION['RegistracijaBrojError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaBrojError']?></p>
                    <?php endif ?>
                </div>
                <div class="input  w-100 w-lg-50 d-flex flex-column  justify-content-start m-3">
                <label>Korisnicko Ime</label>
                <input type="text" name="korisnickoIme" value='<?=$zKorIme?>'>
                <?php if(isset($_SESSION['RegistracijaKorisnickoImeError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaKorisnickoImeError']?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class=" d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input  w-100 w-lg-50 d-flex flex-column align-items-start justify-content-start m-3">
                <label>E-mail</label>
                <input type="text" class="w-100" name="Email" value='<?=$zEmail?>'>
                <?php if(isset($_SESSION['RegistracijaEmailError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaEmailError']?></p>
                    <?php endif ?>
                </div>
                
            </div>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label>Lozinka</label>
                <input type="text" name="Lozinka" value='<?=$zLozinka?>'>
                <?php if(isset($_SESSION['RegistracijaLozinkaError'])): ?>
                    <p class="loginGreska"><?=$_SESSION['RegistracijaLozinkaError']?></p>
                    <?php endif ?>
                </div>
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label>Ponovite lozinku</label>
                <input type="password" name='Lozinka2'>
                <?php if(isset($_SESSION['LozinkeSeNePoklapaju'])): ?>
                    <p class="loginGreska"><?=$_SESSION['LozinkeSeNePoklapaju']?></p>
                    <?php endif ?>
                </div>
                <input type="hidden" name="status" value="2">
            </div>
            <div class="d-flex justify-content-start align-items-start m-3"><input type="submit" name="registerSubmit" class="register_button" value="Registruj se"></div>
            <?php if(isset($_SESSION['KorisnikVecPostoji'])): ?>
                    <p class="loginGreska"><?=$_SESSION['KorisnikVecPostoji']?></p>
                    <?php endif ?>
        </form>
    </div>
</div>  
<?php 

        include "fixed/footer.php";
?>