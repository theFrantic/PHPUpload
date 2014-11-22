<?php
/**
 * Functions that contains the business logic
 * User: frantic
 * Date: 22-11-2014
 * Time: 13:28
 */
require_once('./db.functions.php');

/**
 * Function that returns the default image order
 * @return new image order
 */
function get_default_images_order(){
    return count_images() + 1;
}

/**
 * Function to store image on db
 * @param $url
 * @return bool
 */
function store_image($url){
    $order = count_images() + 1;
    $done = insert_image($url, $order);
    return $done;
}

function list_images(){
    $stmt = get_images();
    while($row = $stmt->fetch()){
        log_notice("Storing on array image: " . $row['url']);
        echo $row['url'] . "<br />";
    }
}