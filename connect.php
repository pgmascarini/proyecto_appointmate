<?php
define('HOST', 'mysql:38000');
define('USER', 'ddbbprueba');
define('PASS', 'proyectosf5');
define('DBNAME', 'databaseprueba');

$conn = new PDO('mysql:host=mysql:3306;dbname=' . DBNAME . ';', USER, PASS);