<?php 

if(isset($_SESSION['korisnik'])): ?>
 <?php 
      if(!in_array('views',$path_info)):
  
  ?>  
<a href="views/porudzbine.php" class="text-decoration-none">
<div class="user_acc m-2">
    <div class="user_acc_wrapp text-center" id='user' data-User='<?=$_SESSION['korisnik']->id_korisnik?>'> 
        

       
        <div class="user_icon">
        <?php 
      if(!in_array('views',$path_info)):
  
  ?>        
        <img src="assets/img/user.png" alt="korisnikova slika" width="25px" height="25px">
    <?php endif ?>

    <?php 
      if(in_array('views',$path_info)):
  
  ?>        
        <img src="../assets/img/user.png" alt="korisnikova slika" width="25px" height="25px">
    <?php endif ?>
    </div>
        <div class="user_name font-Linotte text-decoration-none text-braon"><?=$_SESSION['korisnik']->korisnicko_ime ?></div>
    </div>
</div>
</a>
<?php else: ?>
    <a href="porudzbine.php"  class="text-decoration-none">
<div class="user_acc m-2">
    <div class="user_acc_wrapp text-center" id='user' data-User='<?=$_SESSION['korisnik']->id_korisnik?>'> 
        

       
        <div class="user_icon">
        <?php 
      if(!in_array('views',$path_info)):
  
  ?>        
        <img src="assets/img/user.png" alt="korisnikova slika" width="25px" height="25px">
    <?php endif ?>

    <?php 
      if(in_array('views',$path_info)):
  
  ?>        
        <img src="../assets/img/user.png" alt="korisnikova slika" width="25px" height="25px">
    <?php endif ?>
    </div>
        <div class="user_name font-Linotte text-braon"><?=$_SESSION['korisnik']->korisnicko_ime ?></div>
    </div>
</div>
</a>
<?php endif ?>
<?php endif ?>