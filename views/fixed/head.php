<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php 
  
   
    $path=$_SERVER['REQUEST_URI'];
         $path_info= explode('/',$path);
         
         if(!in_array("views",$path_info)): ?>
    <meta charset="UTF-8">
    <?php  if(basename($_SERVER['PHP_SELF']) == 'index.php'):?>
    <meta name="description" content="Dobro došli na zvanični sajt sladoledžinice Sladolino.Ovde možete saznati sve o našim ukusima i novostima iz naše sladoledžinice.">
    <?php endif ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--swipperJS-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Marck+Script&family=Patrick+Hand&family=Salsa&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="assets/img/logo_IceCream.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Sladolino</title>
    </head>
    <?php endif ?>
<?php if(in_array("views",$path_info)): ?>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--swipperJS-->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>    
<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Marck+Script&family=Patrick+Hand&family=Salsa&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="../assets/img/logo_IceCream.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sladolino</title>
    </head>
    <?php endif ?>