<?php
/**
 * Script that controls db connection
 * User: frantic
 * Date: 22-11-2014
 * Time: 13:10
 */
require_once('./read_configuration.php');
require_once('./logger/log.configurator.php');

/**
 * Function to connect to the MySQL db
 * @return PDO Connection
 */
function connect_db(){
    try {
        $conf = parse_ini();        //Load the configuration.ini file
        $connectionString = 'mysql:host=' . $conf['db']['host']
            . ';dbname=' . $conf['db']['database'];
        log_notice('Connecting db... ' . $connectionString);
        $con = new PDO($connectionString, $conf['db']['user'], $conf['db']['password']);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $con;
    }
    catch(PDOException $e)
    {
        log_fatal( $e->getMessage());
    }
}

/**
 * Function to close MySQL database connection
 * @param $con - The PDO Connection
 */
function close_connection($con){
    $con = null;
}