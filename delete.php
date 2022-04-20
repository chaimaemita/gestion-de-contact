<?php
require 'log.php';
require_once 'model.user.php';

$user = new User();

$id = $_GET["id"];
$del = $user->deleteData($id);
if ($user->deleteData($id)) {
    
    header("location: contact.php");
    exit();
}

?>