<?php

function validString($var)
{
    return trim(htmlentities(htmlspecialchars($var)));
}

function minVal($string, $min)
{
    if (strlen($string) < $min) {
        return true;
    }
    return false;
}

function alphabet_only($var)
{
    if (preg_match("/^[a-zA-Z]+$/", $var) == 1) {
        return true;
    }
    return false;
}

function maxVal($string, $max)
{
    if (strlen($string) > $max) {
        return true;
    }
    return false;
}
