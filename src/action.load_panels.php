<?php
/**
 * Action that returns the images panels ordered as they are on db
 * User: frantic
 * Date: 23-11-2014
 * Time: 10:53
 */

require_once('./read_configuration.php');
require_once('./logger/log.configurator.php');
require_once('./mvm.images.php');

echo list_images();         //Returns the ordered panels