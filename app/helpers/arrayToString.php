<?php
if (!function_exists('array_to_string')) {
    function array_to_string($array)
    {
        $string = '';
        foreach ($array as $key => $val) {
            $string .= $key . ':' . $val . ',';
        }
        return $string;
    }
}
