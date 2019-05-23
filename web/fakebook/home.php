<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Fakebook</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>

   <div class="app-wrap">

      <div class="icon-bar">
         <a href="#">
            <i class="fa fa-home"></i>
            Home
         </a>
         <a href="#">
            <i class="fa fa-bell"></i>
            Notifications
         </a>
         <a href="#">
            <i class="fa fa-envelope"></i>
            Messages
         </a>
         <a href="#">
            <i class="fa fa-user"></i>
            Me
         </a>
      </div>

      <header class="app-header">
         <a href="#" class="button">
            <i>back</i>
         </a>

         <a href="#" class="fbutton">
            <i>What's on your mind? </i>
         </a>

         <a href="#" class="button">
            <i class="fa fa-cog"></i>
         </a>
      </header>

      <div class="content">
         <p>No content yet :(
            <br><br><br><br><br><br><br><br><br><br><br><br>
         </p>
      </div>

   </div>

</body>

<script>
   function search(text) {
      let url = "teamActivity05.php?search=" + text;
      window.location = url;
   }
</script>

</html>

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

if (isset($_GET['search'])) {
   $stmt = $db->prepare('SELECT book, chapter, verse, content FROM message WHERE book=:book');
   $stmt->execute(array(':book' => $_GET['search']));
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


   foreach ($rows as $message) {
      echo "<b>" . $message['book'] . " " . $message['chapter'] . ": " . $message['verse'] . "</b> - " . $message['content'];
      echo '<br/>';
   }
} else {
   foreach ($db->query('SELECT book, chapter, verse, content FROM message') as $message) {
      echo "<b>" . $message['book'] . " " . $message['chapter'] . ": " . $message['verse'] . "</b> - " . $message['content'];
      echo '<br/>';
   }
}

?>