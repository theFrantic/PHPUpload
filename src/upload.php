<?php
/**
 * Created by PhpStorm.
 * User: frantic
 * Date: 21-11-2014
 * Time: 23:07
 */
include('read_configuration.php');
$conf = get_parse_ini();    //Receives the configuration array

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = $conf['file_process']['images_path'];   //2

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    move_uploaded_file($tempFile,$targetFile); //6
}