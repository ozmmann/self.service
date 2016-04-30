<?php
    /**
     * Class Loader
     *
     * autoload classes
     *
     * @static array $map     this is classes map array
     */
    class Loader{
        private static $map = ClassesMap::MAP;
        /**
         * @param string $class
         */
        public static function autoload($class){
            $class_name = self::getClassName($class);
            $directory_name = self::getClassDirectory($class);
            $path = self::getRealPath($class);

            if(key_exists($directory_name, self::$map)){
                if(key_exists($class_name, self::$map[$directory_name])){
                    $path = self::$map[$directory_name][$class_name];
                }
            }

            self::includeClass($path);
        }

        /**
         * require_once function
         *
         * @param string $path
         */
        private static function includeClass($path){
            if(self::checkPath($path)){
                require_once $path;
            }
            else{
                //todo need exception
                echo 'File: '.$path.' not found!';
            }
        }
        /**
         * Checking path to file
         *
         * @param string $path
         * @return bool
         */
        private static function checkPath($path){
            if(file_exists('core/'.$path)){
                return true;
            }
            return false;
        }

        /**
         * return real path from namespace
         *
         * @param string $path
         * @return string
         */
        private static function getRealPath($path){
            return strtolower(str_replace('\\', '/', $path)).'.class.php';
        }

        /**
         * return only class name
         *
         * @param string $path
         * @return string
         */
        private static function getClassName($path){
            return strtolower(substr($path, strrpos($path, '\\')+1));
        }

        /**
         * return only base directory name
         *
         * @param string $path
         * @return string
         */
        private static function getClassDirectory($path){
            return strtolower(substr($path, 0, strpos($path, '\\')));
        }
    }
