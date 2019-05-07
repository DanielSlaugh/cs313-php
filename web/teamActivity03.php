<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>

<body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="Name">Name: </label>
      <input type="text" name="name">
      <br>
      <label for="email">Email: </label>
      <input type="text" name="email">
      <br>
      <label for="major">Major:</label>
      <select id="major" name="major">
         <br><br>
         <option value="cs">Computer Science</option>
         <option value="wwd">Web Design and Development</option>
         <option value="cit">Computer Information tech</option>
         <option value="ce">Computer engineering</option>
      </select>
      <br><br>
      <label for="comments" rows="5" cols="40">Comments:</label>
      <textarea name="comments"></textarea>
      <input type="submit" value="submit" name="submit">
   </form>

   <?php
   // Declare Variables
   $name = "";
   $email = "";
   $major = "";
   $comments = "";

   $name = $_POST["name"];
   $email = $_POST["email"];
   $major = $_POST["major"];
   $comments = $_POST["comments"];

   echo $email;
   echo $name;
   echo "<br";
   echo "<br";
   echo $major;
   echo "<br";
   echo $comments;
   echo "<br";

   ?>



</body>

</html>