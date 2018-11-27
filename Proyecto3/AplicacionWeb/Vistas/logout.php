<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/25/2018
 * Time: 11:01 PM
 */
@session_destroy();
header("Location: ./index.php");
echo "<script> localStorage.clear();</script>";