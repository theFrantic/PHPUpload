<?php
/**
 * Simple log configurator abstraction
 * User: frantic
 * Date: 22-11-2014
 * Time: 13:41
 */

require_once('./logger/Compatibility.php');
require_once('./logger/FileLogger.php');
require_once('./logger/PackageInfo.php');
require_once('./read_configuration.php');

//Use packages
use gehaxelt\fileLogger\Compatibility;
use gehaxelt\fileLogger\CompatibilityException;
use gehaxelt\fileLogger\FileLogger;
use gehaxelt\fileLogger\PackageInfo as FLPackageInfo;



/**
 * Function to create the File Class
 * @return FileLogger
 */
function create_log(){
    try {
        $compat = Compatibility::check();
    } catch(CompatibilityException $e){
        die($e->getMessage());
    }
    $conf = parse_ini();
    $ds = DIRECTORY_SEPARATOR;      //if needed
    $log = new FileLogger($_SERVER['DOCUMENT_ROOT'] . $conf['log']['path'] . '\\' . $conf['log']['file_name']);
    return $log;
}

/**
 * Function to log Notice
 * @param $logMessage
 * @throws \gehaxelt\fileLogger\FileLoggerException
 */
function log_notice($logMessage){
    $log = create_log();
    $log->log($logMessage, FileLogger::NOTICE);
}

/**
 * Function to log warning
 * @param $logMessage
 * @throws \gehaxelt\fileLogger\FileLoggerException
 */
function log_warning($logMessage){
    $log = create_log();
    $log->log($logMessage, FileLogger::WARNING);
    $log = null;
}

/**
 * Function to log Error
 * @param $logMessage
 * @throws \gehaxelt\fileLogger\FileLoggerException
 */
function log_error($logMessage){
    $log = create_log();
    $log->log($logMessage, FileLogger::ERROR);
    $log = null;
}

/**
 * Function to log Fatal
 * @param $logMessage
 * @throws \gehaxelt\fileLogger\FileLoggerException
 */
function log_fatal($logMessage){
    $log = create_log();
    $log->log($logMessage, FileLogger::FATAL);
    $log = null;
}