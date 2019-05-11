<?php
   session_start();

   $broccoli = $_SESSION["broccoli"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=1, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>View Cart</title>
</head>
<body>
<h5>Here are your items: <?php echo $broccoli; ?></h5>
</body>
</html>







<!-- if(isset($_SESSION["lastname"])){
unset($_SESSION["lastname"]);
} -->