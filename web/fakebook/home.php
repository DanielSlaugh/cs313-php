<?php
require('dbConnect.php');
$db = get_db();
$query = 'SELECT u.display_name, m.message_text, m.message_time FROM users u JOIN message m ON u.id = m.user_id';
$stmt = $db->prepare($query);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$username = htmlspecialchars($_POST['uname']);
$user_password = htmlspecialchars($_POST['psw']);

$query = 'SELECT password, display_name, FROM users WHERE username=$fusername AND u.password=$user_password';
$query = 'SELECT display_name, FROM users WHERE username=$fusername';
$stmt = $db->prepare($query);
$stmt->execute();
$current_user = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($username != "") {
   $dispay_name = $current_user[display_name];
   $user_id = $current_user[user_id];

   echo "Test <br>";
   echo $dispay_name;
   echo $user_id;
   echo $username;
   echo "<br>";
   echo $user_password;
}
// if we don't have a login, go to the log in page
// else if we do, ,
// if the username and password are real, load the page with variables
// else, go to the login page and display error message

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Fakebook</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body onload="load_home_page()">

   <div class="app-wrap">

      <div class="icon-bar">
         <a href="https://polar-plateau-20469.herokuapp.com/fakebook/home.php"><i class="fa fa-home" onclick="load_home_page()"></i>Home</a>
         <a href="#"><i class="fa fa-bell"></i>Notifications</a>
         <a href="#"><i class="fa fa-envelope"></i>Messages</a>
         <a href="#"><i class="fa fa-user" onclick="load_profile_page()"></i>Me</a>
      </div>

      <header class="app-header" id="main_head">
         <a href="#" class="button" id="main_head"><i>back</i></a>
         <a href="#" class="post_button" id="main_head" onclick="load_comment_page();"><i>What's on your mind? </i></a>
         <a href="#" class="button" id="main_head" onclick="add_content()"><i class="fa fa-cog"></i></a>
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

            <form class="full_width" id="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <label for="uname"><b>Username</b></label><br>
               <input class="full_width" type="text" placeholder="Enter Username" name="uname" required><br>
               <label for="psw"><b>Password</b></label><br>
               <input class="full_width" type="password" placeholder="Enter Password" name="psw" required><br>
               <button class="auth_button" type="submit">Login</button>
               <p class="full_width">or</p>
               <button class="auth_button2" type="button" onclick="load_sign_up_page()">Sign-up</button>
            </form>

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
            </form>

            <p id="new_user_message"><br>Congratulations! You've created a new account. <br>
               Go ahead and log in so you can have fun with your friends!</p>

         </div>
         <br><br><br><br><br><br><br><br><br><br>
         <br><br>
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