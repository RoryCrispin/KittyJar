<?php

function php_getGroupCode($doThrowError)
{
    if (isset($_COOKIE['groupCode'])) {
        return $_COOKIE['groupCode'];
    } else if (isset($_GET['groupCode'])) {
        return $_GET['groupCode'];
    } else {
        if ($doThrowError) {
        } else {
            return NULL;
        }
    }

}

function php_setGroupCode($val){
    setcookie('groupCode', $val);
}

function php_groupCodeError(){
    header( 'Location: index.php?error' );
}