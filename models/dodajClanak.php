<?php 
  include "setup.php";
  include "functions.php";

  if($_POST['naslovClanka'] != ' ' && (is_uploaded_file($_FILES['slikaZaUpload']['tmp_name']) || (isset($_POST['linkZaUpload']) && $_POST['linkZaUpload'] != '')) && $_POST['kategorijaClanak'] !=0){
    $target_dir='../assets/img/';
    $target_file = $target_dir . basename($_FILES["slikaZaUpload"]["name"]);
    $tipSlike=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $naslov=$_POST['naslovClanka'];
    $sadrzaj=$_POST['tekstClanka'];
    $datum= $_POST['datum_objave'];
    if(is_uploaded_file($_FILES['slikaZaUpload']['tmp_name'])){
        $slika=$target_file;
        $_SESSION['nisteUneliSlikuClanka']='';
    }
    else if(isset($_POST['linkZaUpload']) && $_POST['linkZaUpload'] != ''){
        echo 'pera';
            $slika=$_POST['linkZaUpload'];
     
    }
    else{
        $_SESSION['nisteUneliSlikuClanka']='Niste uneli sliku';
    }
    $kategorija=$_POST['kategorijaClanak'];
   
    echo $kategorija;
    if(isset($_POST['linkZaUpload'])){
      echo $_POST['linkZaUpload'];
    }
    if(is_uploaded_file($_FILES['slikaZaUpload']['tmp_name'])){
      echo $target_dir.basename($_FILES["slikaZaUpload"]["name"]);;
    }
    else{
      echo 'pera';
    }
    echo $slika;
    $dodaj=dodajClanak($naslov,$sadrzaj,$slika,$datum,$kategorija);
    redirect("../views/admin.php");

  
  }
  else{
    $_SESSION['LoseUnetClanak']='Niste lepo uneli clanak';
  }

  ?>