<?php
$a = 'D:\Downloads/';
if (!file_exists($a)) {
    mkdir("D:\Downloads");
}
include_once "Mysqldump.php";
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=leavemgmt', 'root', '');
$dump->start($a . date("Y-m-d-H-i-s") . '.sql');
header('Location:index.php?message=Database Download SuccessFully');

?>