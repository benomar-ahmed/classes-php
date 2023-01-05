<?php

session_start();

require 'Classes/User.php';
$newuser = new User();
$newuser->disconnect();

?>