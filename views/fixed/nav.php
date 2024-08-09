<?php include "head.php" ;


      if(!in_array('views',$path_info)){
        require_once "models/setup.php";
        include "models/functions.php";
      }
      else{
        require_once "../models/setup.php";
        include "../models/functions.php";
      }
   
   
    
      $linkovi=dohvatiLinkove();
      //echo "obrisati sesiju kad zavrsim korpu";
      //$_SESSION['korisnik']=ulogujKorisnika('nikola.djuric.79.21@ict.edu.rs','b52f3879b092d28a83113947457cc68d'); 
?>

<body>

<div class="body_wrapper h-100  mx-auto d-flex flex-column bg-white">
<header>
  <?php 
      if(!in_array('views',$path_info)):
      
  ?>
    <nav class="navbar navbar-expand-lg bg-white navigacija  d-flex justify-content-center ">
   
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse flex-grow-0 p-3 px-5" id="navbarSupportedContent">
  <?php if(isset($_SESSION['korisnik'])):  ?>
              <a href="views/porudzbine.php" class="text-decoration-none porudzbineLink font-Linotte sign_up m-3">Porudžbine </a>
             
              <?php endif ?>
    <ul class="navbar-nav mr-auto nav-lista d-flex justify-content-even align-items-center">
    <li>
      <a class="navbar-brand p-3" href="#"><img src="assets/img/logo_IceCream.png" alt="Sladolino logo" width="100" height="100" class="Logo "></a>
      </li>
    <?php foreach($linkovi as $link): ?>  
      <?php if($link->naziv !='Admin'): ?>
    <li class="nav-item active m-3 mx-3">
        <a class="nav-link font-Linotte" href="./views/<?=$link->link?>"><?=$link->naziv?> <span class="sr-only"></span></a>
      </li>
      <?php endif ?>
     
      <?php endforeach ?>
      <?php if(isset($_SESSION['korisnik'])): ?>
      <?php if($_SESSION['korisnik']->status_id == '1'): ?>
       <li>
          <a class="nav-link font-Linotte" href="./views/admin.php">Admin <span class="sr-only"></span></a>
          </li>
          <?php endif ?>
        <?php endif ?>
    </ul>
    <div class="user  d-flex justify-content-center align-items-center">
<?php if(!isset($_SESSION['korisnik'])): ?>
              <a href="views/login.php?dugmeUloguj=true" class="text-decoration-none font-Linotte sign_up m-3">Uloguj se </a>
              <a href="views/register.php" class="text-decoration-none font-Linotte sign_up m-3">Registruj se </a>
              <?php endif?>
              <?php if(isset($_SESSION['korisnik'])): ?>
            
              <a href="models/izloguj.php" class="text-decoration-none font-Linotte sign_up m-3">Izloguj se </a>
             
              <?php endif ?>
      <a href="views/order.php"><img src="assets/img/ice_cream_cart.png" alt="Kolica sa sladoledom" width="30" height="30"></a>
      <?php include "user_acc.php" ?>
    </div>
  </div>

</nav>

<?php endif ?>
    </header>
        <?php  if(in_array('views',$path_info)): ?>
          <nav class="navbar navbar-expand-lg bg-white navigacija  d-flex justify-content-center shadow-sm">
            <?php if(!in_array('order.php',$path_info)): ?>
          <a href="order.php" class="poruciteDugme2 font-Linotte text-white">Poručite</a>
              <?php endif ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse flex-grow-0 p-3 px-5" id="navbarSupportedContent">
        <?php if(isset($_SESSION['korisnik'])): ?>
              <a href="porudzbine.php" class="text-decoration-none porudzbineLink font-Linotte sign_up m-3">Porudžbine </a>
             
              <?php endif ?>
          <ul class="navbar-nav mr-auto nav-lista d-flex justify-content-even align-items-center">
          <li>
            <a class="navbar-brand p-3" href="../index.php"><img src="../assets/img/logo_IceCream.png" width="100" height="100" class="Logo "></a>
            </li>
            <?php foreach($linkovi as $link): ?>  
              <?php if($link->naziv !='Admin'): ?>
    <li class="nav-item active m-3 mx-3">
        <a class="nav-link font-Linotte" href="<?=$link->link?>"><?=$link->naziv?> <span class="sr-only"></span></a>
      </li>
      <?php endif ?>
      <?php endforeach ?>
      <?php if(isset($_SESSION['korisnik'])): ?>
      <?php if($_SESSION['korisnik']->status_id == '1'): ?>
       <li>
          <a class="nav-link font-Linotte" href="admin.php">Admin <span class="sr-only"></span></a>
          </li>
        <?php endif ?>
        <?php endif?>
    </ul>
          </ul>
          <div class="user d-flex justify-content-center align-items-center">
            <?php if(!isset($_SESSION['korisnik'])): ?>
              <a href="login.php?dugmeUloguj=true" class="text-decoration-none font-Linotte sign_up m-3">Uloguj se </a>
              <a href="register.php" class="text-decoration-none font-Linotte sign_up m-3">Registruj se </a>
              <?php endif ?>
             
              <?php if(isset($_SESSION['korisnik'])): ?>
              <a href="../models/izloguj.php" class="text-decoration-none font-Linotte sign_up m-3">Izloguj se </a>
              <?php endif ?>
            <a href="order.php"><img src="../assets/img/ice_cream_cart.png" width="30" height="30"></a>
            <?php include "user_acc.php" ?>
          </div>
        </div>
      
      </nav>
        <?php endif ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>