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