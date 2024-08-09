<?php
        
        session_start();
        function redirect($page) {
            header("Location: $page");
        }

?>