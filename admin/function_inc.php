<?php

if (!function_exists('get_safe_value')) {
    function get_safe_value($con, $str)
    {
        if ($str != '') {
            return mysqli_real_escape_string($con, $str);
        }
    }
}
