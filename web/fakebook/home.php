<?php
require('dbConnect.php');
$db = get_db();
$query = 'SELECT u.display_name, m.message_text, m.message_time FROM users u JOIN message m ON u.id = m.user_id';
// $query = 'SELECT user_id, message_time, message_text FROM message';
$stmt = $db->prepare($query);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

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
            <i class="fa fa-user" onclick="destroy_content()"></i>
            Me
         </a>
      </div>

      <header class="app-header" id="main_head">
         <a href="#" class="button" id="main_head">
            <i>back</i>
         </a>

         <a href="#" class="post_button" id="main_head" onclick="destroy_content(); create_message_page();">
            <i>What's on your mind? </i>
         </a>

         <a href="#" class="button" id="main_head" onclick="add_content()">
            <i class="fa fa-cog"></i>
         </a>
      </header>

      <div class="content">
         <div id="content_parent">

            <ul class="posts" id="content">

               <?php
               foreach ($posts as $post) {
                  $dispay_name = $post[display_name];
                  $user_id = $post[user_id];

                  $time_day = substr($post[message_time], 8, 2);
                  $time_month = substr($post[message_time], 5, 2);
                  $time_year = substr($post[message_time], 0, 4);
                  $month_array = [No_zero, January, February, March, April, May, June, July, August, September, October, November, December];
                  $message = $post[message_text];

                  echo '<li class="post">
                     <div class="post__title">
                     <h3>' . $dispay_name . '</h3>
                     <p>' . $month_array[intval($time_month)] . ' ' . $time_day . ', ' . $time_year . '</p>
                     </div>
                     <div class="post_content">' . $message . '</div>
                     <a href="#" class="post_comment"><i>comment</i></a>
                     </li>';
               }
               ?>

            </ul>

            <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <textarea class="textarea" id="searchbar" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
               <input class="submit" type="submit" value="Post">
            </form>
         </div>

         <section id="spacing"></section>
      </div>

   </div>

</body>

<script>
   console.log("in the script");

   function load_page() {
      var x = document.getElementById("form");
      x.style.display = "none";
   }

   function search(text) {
      let url = "home.php?search=" + text;
      window.location = url;
   }

   function destroy_content() {
      // Destroy half of what's on the page
      console.log("Enter Thanos");
      if (document.getElementById("content").innerHTML != NULL) {
          var element = document.getElementById("content");
          element.innerHTML = "";
      }
      // element.innerHTML = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
      // element.parentNode.removeChild(element);

      var element2 = document.getElementById("main_head");
      element2.parentNode.removeChild(element2);

      console.log("Should have gone for the head");
      var element3 = document.getElementById("spacing");
      element3.innerHTML = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


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

      console.log("a child is born");
   }
</script>

</html>