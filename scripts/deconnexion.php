<?php
/**
 * Created by PhpStorm.
 * User: royerq
 * Date: 16/10/2017
 * Time: 14:03
 */
session_start();
session_destroy();
header("Location:../index.php");