<?php
	include_once './ripcord/ripcord.php';
	$url = "http://odemo.dinus.org";
	$username = "godadmin";
	$password = "adminthoya";
	$database = "sia_siadin2";

	$common = ripcord::client("$url/xmlrpc/2/common");

	$uid = $common->authenticate($database,$username,$password,array());
	$models = ripcord::client("$url/xmlrpc/2/object");
?>