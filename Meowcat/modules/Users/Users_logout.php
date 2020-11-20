<?php
    /*
    ำรปงอหณ๖ตวยผ
    */
	session_start();
	error_reporting(0);

	if($_GET['action'] == "logout"){
    unset($_SESSION['sign-email']);
    unset($_SESSION['sign-name']);
?>