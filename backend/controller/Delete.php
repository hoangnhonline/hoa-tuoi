<?php
if(!isset($_SESSION))
{
     session_start();
}
require_once "../model/Backend.php";
$model = new Backend;

$id = $_POST['id'];

$mod = $_POST['mod'];

mysql_query("DELETE FROM $mod WHERE id = $id");
exit();

?>
