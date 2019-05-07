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

   echo $name;
   echo "<br>";
   echo $email;
   echo "<br>";
   echo $major;
   echo "<br>";
   echo $comments;
   echo "<br>";

   ?>

   <table>
      <tr>
         <th>Where have you been :</th>
      </tr>
      <tr>
         <td>North America</td>
         <td><input id="north america" type="checkbox" name="checklist[]" value="North America"></td>
      </tr>
      <tr>
         <td>South America</td>
         <td><input id="south america" type="checkbox" name="checklist[]" value="South America"></td>
      </tr>
      <tr>
         <td>Europe</td>
         <td><input id="europe" type="checkbox" name="checklist[]" value="Europe"></td>
      </tr>
      <tr>
         <td>Asia</td>
         <td><input id="asia" type="checkbox" name="checklist[]" value="Asia"></td>
      </tr>
      <tr>
         <td>Australia</td>
         <td><input id="australia" type="checkbox" name="checklist[]" value="Australia"></td>
      </tr>
      <tr>
         <td>Africa</td>
         <td><input id="africa" type="checkbox" name="checklist[]" value="Africa"></td>
      </tr>
      <tr>
         <td>Antartica</td>
         <td><input id="antarctica" type="checkbox" name="checklist[]" value="Antartica"></td>
      </tr>
   </table>

   <?php
      // for ($i=0; $i < 7; $i++) {
      //    $places[$i] = $_POST["checklist[$i]"];
      //    echo $places[$i];
      // }

      $places = $_POST["checklist[]"];
      foreach ($places as $key => $value) {
         echo $value;
      }
   ?>


</body>

</html>