<?php 
session_start();
if (isset($_SESSION["login"])) {

session_destroy();
}
//redirecionamento da pag
header("Location:login.php")
 ?>