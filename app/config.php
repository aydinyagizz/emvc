<?php
/* veritabanı bağlantı bilgilerini ve benzeri sabitleri burada tutacağız.*/

define('DIRECTORY','../app');

global $config;
$config =
    [
        "home" =>
        [
            "modul" => "default",
            "method" => "index"
        ]
    ];

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'panel');