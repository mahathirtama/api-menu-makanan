<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "uasmobprog");

$con = mysqli_connect(HOST, USER, PASS, DB) or die('unnable to connect');
