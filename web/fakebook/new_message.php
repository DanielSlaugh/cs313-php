<?php

$current_id = htmlspecialchars($_POST['current_id']);
$message_text = htmlspecialchars($_POST['message_text']);
// $display_name = htmlspecialchars($_POST['dname']);

echo $current_id;
echo "<br>";
echo $message_text;
// echo $display_name;
// echo "-1";
// echo "<br>";

require('dbConnect.php');
$db = get_db();
echo "0";
echo "<br>";

// INSERT INTO message(user_id, message_text) VALUES(2, 'Only Happy Trees');


$stmt = $db->prepare('INSERT INTO message (user_id, message_text) VALUES (:current_id, :message_text);');
echo "1";
echo "<br>";

$stmt->bindValue(':current_id', $current_id, PDO::PARAM_STR);
echo "2";
echo "<br>";
$stmt->bindValue(':message_text', $message_text, PDO::PARAM_STR);
echo "3";
echo "<br>";

$stmt->execute();
echo "4";
echo "<br>";

$new_page = "home.php?";

header("Location: $new_page");
echo "5";
echo "<br>";
die();
?>