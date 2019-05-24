<?php
try {
   $dbUrl = getenv('DATABASE_URL');

   $dbOpts = parse_url($dbUrl);

   $dbHost = $dbOpts["host"];
   $dbPort = $dbOpts["port"];
   $dbUser = $dbOpts["user"];
   $dbPassword = $dbOpts["pass"];
   $dbName = ltrim($dbOpts["path"], '/');

   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
   echo 'Error!: ' . $ex->getMessage();
   die();
}
echo "PHP: Starting <br>";

$sql = "SELECT * FROM message";
$result = $db->query($sql);

echo "Made it this far <br>";

// if ($result->num_rows > 0) {
echo $result;
$row = $result;
// output data of each row
// while ($row = $result->fetch_assoc()) {
echo "in the loop <br>";
echo "<br> id: " . $row["id"] . "<br> User_id: " . $row["user_id"] .  "<br> time: " . $row["message_time"] . " - Message: " . $row["message_text"] . "<br>";
// }
// } else {
//    echo "0 results";
// }
$db->close();
?>


// $result = mysqli_query($db, $sql);

// while ($row = mysqli_fetch_array($result)) {
// echo $row['FirstName'];
// }


// if (isset($_GET['search'])) {
// $stmt = $db->prepare('SELECT user_id, message_time, message_text FROM message WHERE book=:book');
// $stmt->execute(array(':book' => $_GET['search']));
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


// foreach ($rows as $message) {
// echo "<b>" . $message['message_time'] . "<br>" . $message['message_text'] . "</b> - ";
// echo '<br />';
// }
// } else {
// foreach ($db->query('SELECT book, chapter, verse, content FROM message') as $message) {
// echo "<b>" . $message['book'] . " " . $message['chapter'] . ": " . $message['verse'] . "</b> - " . $message['content'];
// echo '<br />';
// }
// }