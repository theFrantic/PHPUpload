<?php
/**
 * File that contains all db functions
 * User: frantic
 * Date: 22-11-2014
 * Time: 13:20
 */
require_once('./db.connector.php');
require_once('./logger/log.configurator.php');

/**
 * Function to retrieve the quantity of images present on db
 * @return quantity of images
 */
function count_images(){
    try{
        $con = connect_db();
        $query = 'select count(*) '
            . 'from images';

        //Use prepared statments
        $stmt = $con->prepare($query);
        $stmt->execute();

        // Retrieve unique column (scalar)
        $resultSet = $stmt->fetchColumn();
        log_notice('There are ' . $resultSet . ' images stored on db');
        return $resultSet;
    }
    catch(PDOException $e){
        log_fatal('Error on db.configurator->count_images() - ' . $e->getMessage());
        die($e->getMessage());
    }
    return -1;
}

/**
 * Insert the image on database
 * @param $imagePath
 * @param $position
 * @return bool
 */
function insert_image($imagePath, $position){
    $insert = '';
    try {
        $con = connect_db();
        $insert = "insert into images (url, position) values (:url , :position)";

        $stm = $con->prepare($insert);
        $stm->bindParam(':url', $imagePath, PDO::PARAM_INT);
        $stm->bindParam(':position', $position, PDO::PARAM_STR);

        $done = $stm->execute();
        if($done){
            log_notice('Image succesfully stored on db');
        }
        else{
            log_error("Image wasn't stored on db. Insert used: " . $insert );
        }
        return $done;
    }
    catch(PDOException $e){
        log_fatal('Error on db.configurator->insert_image() - ' . $e->getMessage());
        die($e->getMessage());
    }
}

/**
 * Function to retrieve the images from db
 * @return int|PDOStatement
 */
function get_images(){
    try{
        $con = connect_db();
        $query = 'SELECT `id`, `url` FROM `images` WHERE deletes <> 1 order by position';

        //Use prepared statments
        $stmt = $con->prepare($query);
        $stmt->execute();

        log_notice("Images retrieved from db");
        /*while($row = $stmt->fetch()){
            log_notice("Storing on array image: " . $row['url']);
        }*/
        return $stmt;
    }
    catch(PDOException $e){
        log_fatal('Error on db.configurator->select_images() - ' . $e->getMessage());
        die($e->getMessage());
    }
    return -1;
}

/**
 * Function to update the image index
 * @param $id
 * @param $position
 */
function update_image($id, $position){
    $update = '';
    try {
        $con = connect_db();
        $update = "update images set position = :position where id = :id";

        $stm = $con->prepare($update);
        $stm->bindParam(':position', $position, PDO::PARAM_INT);
        $stm->bindParam(':id', $imagePath, PDO::PARAM_INT);

        $done = $stm->execute();
        if($done){
            log_notice('Image succesfully updated on db');
        }
        else{
            log_error("Image wasn't updated on db. Update used: " . $update );
        }
        return $done;
    }
    catch(PDOException $e){
        log_fatal('Error on db.configurator->update_image() - ' . $e->getMessage());
        die($e->getMessage());
    }
}