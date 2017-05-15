<?php
session_start();

session_unset();
session_destroy();
 header( 'Location: proiect1.php', true, 301 );
?>