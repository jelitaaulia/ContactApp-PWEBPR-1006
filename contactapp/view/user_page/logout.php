<?php
session_start(); 
session_unset();
session_destroy();

header('Location: ../../view/user_page/login.php');
exit();
?>