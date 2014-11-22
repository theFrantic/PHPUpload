<?php
/**
 * Created by PhpStorm.
 * User: frantic
 * Date: 21-11-2014
 * Time: 23:11
 */

/**
 * Returns a configuration array
 *
 * @return array|bool
 */
function get_parse_ini()
{
    $file = 'configuration.ini';
    // if cannot open file, return false
    if (!is_file($file))
        return false;

    $ini = file($file);

    // to hold the categories, and within them the entries
    $cats = array();

    foreach ($ini as $i) {
        if (@preg_match('/\[(.+)\]/', $i, $matches)) {
            $last = $matches[1];
        } elseif (@preg_match('/(.+)=(.+)/', $i, $matches)) {
            $cats[$last][trim($matches[1])] = trim($matches[2]);
        }
    }

    return $cats;

}