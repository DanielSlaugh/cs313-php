<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=1, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Purchase confirmed!</title>
</head>

<body>
   <h5>Your order is on the way to: </h5>
   <h5><?php echo $_SESSION["shipping"];
         echo "<br>";
         echo $_SESSION["city"];
         echo "<br>";
         echo $_SESSION["zip"]; ?> </h5>
</body>

</html>