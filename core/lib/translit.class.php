<?php
    namespace lib;
    /**
     * Class Translit
     * @package lib
     * replace cyrillic symbols to latin
     */
    class Translit{
        private $_alphavit = array(
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "е" => "e",
            "ё" => "yo",
            "ж" => "j",
            "з" => "z",
            "и" => "i",
            "й" => "i",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "y",
            "ф" => "f",
            "х" => "h",
            "ц" => "c",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "sh",
            "ы" => "i",
            "э" => "e",
            "ю" => "u",
            "я" => "ya"
        );

        /**
         * @param string $str
         * @return string
         */
        public function doTranslit($str){
            return strtr(strtolower($str), $this->_alphavit);
        }
    }