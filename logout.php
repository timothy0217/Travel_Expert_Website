<?php
/*
    Author: Timothy Tsai
    Date Created: October, 2017
    Class: OOSD Oct 2017
*/
Session_start();
Session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>