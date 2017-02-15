<?php
	session_destroy();
        $redir = "Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php";
        header($redir);         
?>        
