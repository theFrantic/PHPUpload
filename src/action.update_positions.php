<?php
/**
 * Action for update positions of the images
 * User: frantic
 * Date: 23-11-2014
 * Time: 11:55
 */

require_once('./read_configuration.php');
require_once('./logger/log.configurator.php');
require_once('db.functions.php');

$postData = file_get_contents("php://input");
$data = json_decode($postData);

foreach($data->images as $v){
    $id = $v->id;
    $position = $v->position;

    //TODO: Persists data on db
    update_image($id, $position);
}