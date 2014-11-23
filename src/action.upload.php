<?php
/**
 * Created by PhpStorm.
 * User: frantic
 * Date: 21-11-2014
 * Time: 23:07
 */
require_once('./read_configuration.php');
require_once('./logger/log.configurator.php');
require_once('./mvm.images.php');

$conf = parse_ini();    //Receives the configuration array

$ds = DIRECTORY_SEPARATOR;

$storeFolder = $conf['file']['images_path'];   //Folder to store the image

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
    $targetFile =  $targetPath. $_FILES['file']['name'];
    move_uploaded_file($tempFile,$targetFile);

    $url = $storeFolder . '/' . $_FILES['file']['name'];
    log_notice('URL to store: ' . $url);
    store_image($url);
}