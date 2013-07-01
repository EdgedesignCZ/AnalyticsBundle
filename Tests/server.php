<?php
    header("Access-Control-Allow-Methods: OPTIONS,GET,HEAD,POST,PUT,DELETE,TRACE,CONNECT");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Max-Age: 10");

echo "<pre>";

echo "_POST\n";
var_dump($_POST);
echo "\n_GET\n";
var_dump($_GET);