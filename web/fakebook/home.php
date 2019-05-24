<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Fakebook</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body onload="load_page()">

   <div class="app-wrap">

      <div class="icon-bar">
         <a href="https://polar-plateau-20469.herokuapp.com/fakebook/home.php">
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

      <header class="app-header" id="main_head">
         <a href="#" class="button" id="main_head">
            <i>back</i>
         </a>

         <a href="#" class="post_button" id="main_head" onclick="destroy_content()">
            <i>What's on your mind? </i>
         </a>

         <a href="#" class="button" id="main_head" onclick="add_content()">
            <i class="fa fa-cog"></i>
         </a>
      </header>

      <div class="content">
         <div id="content_parent">
            <p id="content">No content yet :( </p>
            <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <textarea class="textarea" id="searchbar" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
               <input class="submit" type="submit" value="Post">
            </form>
         </div>

         <br><br><br><br><br><br><br><br><br><br><br><br>
         <br><br><br><br><br><br><br><br><br><br><br><br>
         <br><br><br><br><br><br><br><br><br><br><br><br>
      </div>

   </div>

</body>

<script>
   console.log("in the script");

   function load_page() {
      var x = document.getElementById("form");
      x.style.display = "none";

      // if (window.XMLHttpRequest) {
      //    // code for IE7+, Firefox, Chrome, Opera, Safari
      //    xmlhttp = new XMLHttpRequest();
      // } else {
      //    // code for IE6, IE5
      //    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      // }
      // xmlhttp.onreadystatechange = function() {
      //    if (this.readyState == 4 && this.status == 200) {
      //       document.getElementById("content").innerHTML = this.responseText;
      //    }
      // };
      // xmlhttp.open("GET", "home.php?", true);
      // xmlhttp.send();

   }

   function search(text) {
      let url = "home.php?search=" + text;
      window.location = url;
   }

   function destroy_content() {
      // Destroy half of what's on the page
      console.log("Enter Thanos");
      var element = document.getElementById("content");
      element.parentNode.removeChild(element);
      var element2 = document.getElementById("main_head");
      element2.parentNode.removeChild(element2);
      console.log("Should have gone for the head");

      create_message_page()
   }

   function create_message_page() {
      var x = document.getElementById("form");
      x.style.display = "block";
   }

   function add_content() {
      var parent = document.createElement("p");
      var node = document.createTextNode("This is new.");
      parent.appendChild(node);
      var element = document.getElementById("content_parent");
      element.appendChild(parent);
      parent.setAttribute('id', "content");

      // // Adds an element to the document
      // var parent = document.getElementById("content_parent");
      // var newElement = document.createElement("p");
      // newElement.setAttribute('id', content);
      // // newElement.innerHTML = html;
      // parent.appendChild(newElement);
      console.log("a child is born");
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
echo "PHP: Starting <br>";

$sql = "SELECT * FROM message";
$result = $db->query($sql);

echo "Made it this far <br>";

// if ($result->num_rows > 0) {

// output data of each row
while ($row = $result->fetch_assoc()) {
   echo "in the loop <br>";
   echo "<br> id: " . $row["id"] . "<br> User_id: " . $row["user_id"] .  "<br> time: " . $row["message_time"] . " - Message: " . $row["message_text"] . "<br>";
}
// } else {
//    echo "0 results";
// }
$db->close();
?>