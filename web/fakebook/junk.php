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



=======================WORKING=============================


<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>User_id</th><th>Time</th><th>Message</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
   function __construct($it)
   {
      parent::__construct($it, self::LEAVES_ONLY);
   }

   function current()
   {
      return "<td style='width: 150px; border: 1px solid black;'>" . parent::current() . "</td>";
   }

   function beginChildren()
   {
      echo "<tr>";
   }

   function endChildren()
   {
      echo "</tr>" . "\n";
   }
}

$dbUrl = getenv('DATABASE_URL');

$dbOpts = parse_url($dbUrl);

$dbHost = $dbOpts["host"];
$dbPort = $dbOpts["port"];
$dbUser = $dbOpts["user"];
$dbPassword = $dbOpts["pass"];
$dbName = ltrim($dbOpts["path"], '/');


try {
   $conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $conn->prepare("SELECT user_id, message_time, message_text FROM message");
   $stmt->execute();

   // set the resulting array to associative
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

   foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
      echo $v;
   }
} catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
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