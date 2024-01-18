<?php

session_start();

if(isset($_SESSION['Korisnik_id']))
{
	unset($_SESSION['Korisnik_id']);

}

header("Location: Login.php");
die;
?>