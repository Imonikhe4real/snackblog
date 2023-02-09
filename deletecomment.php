<?php

include 'fetchlogic.php';
$fetchlogic = new fetchLogic();
$id = $_REQUEST['id'];
$deletecomment = $fetchlogic->deletecomment($id);

if ($deletecomment) {
   header("location:authdashboard.php");
}



?>
