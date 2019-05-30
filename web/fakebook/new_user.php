<?php

$username = htmlspecialchars($_POST['uname']);
$user_password = htmlspecialchars($_POST['psw']);
$display_name = htmlspecialchars($_POST['dname']);

echo $username;
echo $user_password;
echo $display_name;

require('dbconnect.php');
$db = get_db();

$stmt = $db->prepare('INSERT INTO users (username, password, display_name) VALUES (:username, :user_password, :display_name);');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':user_password', $user_password, PDO::PARAM_STR);
$stmt->bindValue(':display_name', $display_name, PDO::PARAM_STR);
$stmt->execute();

$new_page = "home.php";

header("Location: $new_page");
die();

?>