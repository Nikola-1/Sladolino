<?php 
        define("USERNAME",'root');
        define("PASSWORD",'');
        define("DATABASE",'sladolino');
        define("SERVER",'localhost');
        define("PORT",'4307');
        try{
            $conn= new PDO('mysql:host='.SERVER.";port=4307;dbname=".DATABASE.";charset=utf8",USERNAME,PASSWORD);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }

?>