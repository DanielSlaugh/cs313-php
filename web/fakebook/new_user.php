<?php

$user_name = htmlspecialchars($_POST['uname']);
$user_password = htmlspecialchars($_POST['psw']);
$display_name = htmlspecialchars($_POST['dname']);

echo $user_name;
echo $user_password;
echo $display_name;

?>