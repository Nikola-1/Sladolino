<?php 
if(isset($_GET['dugmeUloguj'])):
        include "fixed/head.php";
        include "fixed/nav.php" ;
        

      
        if(isset($_SESSION['zapamcenEmail'])){
            $zEmail=$_SESSION['zapamcenEmail'];
        }
        else{
            $zEmail='';
        }
        if(isset($_SESSION['zapamcenaLozinka'])){
            $zLozinka=$_SESSION['zapamcenaLozinka'];
        }
        else{
            $zLozinka='';
        }
?>
<div class="w-100 order_bg d-flex justify-content-center align-items-center m-auto">
    
    <div class="order_stage1 m-auto my-3 p-lg-5 d-flex flex-column justify-content-center w-100 align-items-center align-items-lg-center">
        <form action="../models/logovanje.php"  class="w-50"  method="POST" id="logovanje">
            <h3 class="Bungee text-center">Prijavi se</h3>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input w-100 w-lg-50 d-flex flex-column m-3">
                <label class="text-center">Email</label>
                <input type="text" name="Email" value="<?=$zEmail?>">
                <?php if(isset($_SESSION['porukaErrorEmail'])): ?>
                <p class="loginGreska"><?=$_SESSION['porukaErrorEmail']?></p>
                <?php endif ?>
                </div>
                
            </div>
            <div class="  d-flex flex-lg-row flex-column justify-content-center align-items-center m-3">
                <div class="input  w-100 w-lg-50 d-flex flex-column m-3">
                <label class="text-center">Lozinka</label>
                <input type="password" name="Lozinka" value="<?=$zLozinka?>">
                <?php if(isset($_SESSION['porukaErrorLozinka'])): ?>
                <p class="loginGreska"><?=$_SESSION['porukaErrorLozinka']?></p>
                <?php endif ?>
                </div>
                
            </div>
           
            <div class="d-flex justify-content-start align-items-start m-3"><input type="submit" name="btnProvera" id='loginBtn'  class="login_button" value="Prijavi se"></div>
            
        </form>
    </div>
</div>  
<?php if(isset($_SESSION['ZakljucanNalog'])): ?>
                    <a><?=$_SESSION['ZakljucanNalog']?></a>
                    <?php endif ?>
<?php 
            
        include "fixed/footer.php";
?>
<?php else: http_response_code(403); ?>
<?php endif ?>
