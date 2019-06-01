<?php
require('dbConnect.php');
$db = get_db();

// Get all the variables to load message feed when the home page is created
error_reporting(E_ALL);
ini_set('display_errors', 1);
$query = 'SELECT u.display_name, m.message_text, m.message_time FROM users u JOIN message m ON u.id = m.user_id ORDER BY m.message_time DESC';
$stmt = $db->prepare($query);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// These variables need a global scope to be accessed in the HTML
$username = "";
$user_password = "";
$valid_user = false;
$current_display_name = "";

// if the user has tried to log in, check what they types against the database
// If they're good to go, save their data to work with
if (isset($_POST['uname'])) {
   $username = htmlspecialchars($_POST['uname']);
}
if (isset($_POST['psw'])) {
   $user_password = htmlspecialchars($_POST['psw']);
   try {
      $stmt = $db->prepare("SELECT u.id, u.display_name, u.username, u.password FROM users u WHERE u.username='$username' AND u.password='$user_password'");
      $stmt->execute();
      $current_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      echo $e->getMessage();
   }
   foreach ($current_user as $user) {
      // valid_user will only get set if we have a valid entry in the table
      $valid_user = true;
   }
   foreach ($current_user as $user) {
      $current_display_name = $user['display_name'];
      $current_id = $user['id'];
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Fakebook</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
   <script>
      var val = "<?php echo $valid_user; ?>";
   </script>
   </script>
</head>

<body onload="load_home_page(val)">

   <div class="app-wrap">

      <!-- Top Menu bar -->
      <div class="icon-bar">
         <a><i class="fa fa-home" onclick="load_home_page(val)"></i>Home</a>
         <a><i class="fa fa-bell"></i>Notifications</a>
         <a><i class="fa fa-envelope"></i>Messages</a>
         <a><i class="fa fa-user" onclick="load_profile_page()"></i>Me</a>
      </div>

      <!-- What's on your mind user bar -->
      <header class="app-header" id="main_head">
         <a class="button" id="main_head"><i><?php if ($valid_user) {
                                                echo $current_display_name;
                                             } else {
                                                echo "Guest";
                                             } ?></i></a>
         <a class="post_button" id="main_head" onclick="load_comment_page();"><i>What's on your mind? </i></a>
         <a class="button" id="main_head" onclick="add_content()"><i class="fa fa-cog"></i></a>
      </header>

      <!-- Message Feed -->
      <div class="content">
         <div id="content_parent">
            <ul class="posts" id="content">

               <?php
               foreach ($posts as $post) {
                  $dispay_name = $post['display_name'];

                  $time_day = substr($post['message_time'], 8, 2);
                  $time_month = substr($post['message_time'], 5, 2);
                  $time_year = substr($post['message_time'], 0, 4);
                  $month_array = ['No_zero', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                  $message = $post['message_text'];

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

            <!-- Create a new Message -->
            <form id="form" action="">
               <input type="hidden" name="current_id" id="current_id" value="<?php echo $current_id ?>">
               <textarea class="textarea" id="message_text" cols="30" rows="10" placeholder="What's on your mind?" name="message_text"></textarea>
               <input class="submit" type="button" value="Post" onclick="makeRequest(document.getElementById('current_id').value,
                                                                                     document.getElementById('message_text').value);
                                                                                     load_home_page(val);
                                                                                     window.location.reload();">
               <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </form>

            <!-- Loggin Page -->
            <form class="full_width" id="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <label for="uname"><b>Username</b></label><br>
               <input class="full_width" type="text" placeholder="Enter Username" name="uname" required><br>
               <label for="psw"><b>Password</b></label><br>
               <input class="full_width" type="password" placeholder="Enter Password" name="psw" required><br>
               <button class="auth_button" type="submit">Login</button>
               <p class="full_width">or</p>
               <button class="auth_button2" type="button" onclick="load_sign_up_page()">Sign-up</button>
               <br><br><br><br><br><br>
            </form>

            <!-- Sign up Page -->
            <form class="full_width" id="sign_up_form" method="post" action="new_user.php">
               <label for="uname"><b>Username</b></label><br>
               <input class="full_width" type="text" placeholder="Enter Username" name="uname" required><br>
               <label for="psw"><b>Password</b></label><br>
               <input class="full_width" type="password" placeholder="Enter Password" name="psw" required><br>
               <label for="dname"><b>Display Name</b></label><br>
               <input class="full_width" type="text" placeholder="Enter Name" name="dname" required><br>
               <button class="auth_button" type="submit">Sign-up</button>
               <p class="full_width">or</p>
               <button class="auth_button2" type="button" onclick="load_profile_page()">Login</button>
               <br><br><br><br><br>
            </form>

            <!-- Confirmation of new Account -->
            <p id="new_user_message"><br>Congratulations! You've created a new account. <br>
               Go ahead and log in so you can have fun with your friends!
               <br><br><br><br><br><br><br><br><br><br>
               <br><br></p>

         </div>

         <section id="spacing"></section>
      </div>
   </div>
</body>
<script src="fakebook.js"></script>
<script>
   var y = <?php $username ?>;
   console.log(y);
</script>

</html>