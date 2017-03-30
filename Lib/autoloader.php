<?php

/**
 * Class Autoloader
 *
 * This is a generic auto loader class to load all classes in this framework.
 */
class Autoloader {

    /**
     * @param $className
     * @return bool
     */
    static public function loader($className) {

        $filename = str_replace('\\', '/', $className) . ".php";

        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return true;
            }
        }
        return false;
    }
}
spl_autoload_register('Autoloader::loader');

