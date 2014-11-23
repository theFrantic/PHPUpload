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

    $html = "";
    while($row = $stmt->fetch()){
        log_notice("Storing on array image: " . $row['url']);
        //echo $row['url'] . "<br />";

        $html .= "<li class='panel panel-info' data-id='" . $row['id'] . "'>\r\n";      //IMPORTANT! this is the element that we'll be using on javascript to read  the db id
        // Header
        $html .= "<div class='panel-heading'>\r\n";
        $html .= "<i class='fa fa-unsorted fa-border'></i> Drag and drop to sort\r\n";
        $html .= "</div>\r\n";
        // Body
        $html .= "<div class='panel-body'>\r\n";
        $html .= "<img src='" . $row['url'] . "' data-id='" . $row['id'] . "' class='image-circle' width='60' height='60' /> \r\n";
        $html .= "<button type='button' class='btn btn-danger' onclick='clickToDelete(this)' data-id='" . $row['id'] . "'><i class='fa fa-trash-o'></i></button>\r\n";
        $html .= "</div>\r\n";

        $html .= "</li>\r\n";
    }

    return $html;
}