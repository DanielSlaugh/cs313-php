<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="shopping.css" rel="stylesheet">
   <!-- <link href="style.css" rel="stylesheet">
   <link href="animate.css" rel="stylesheet">
   <link href="bootstrap.min.css" rel="stylesheet">
   <link href="font-awesome.css" rel="stylesheet"> -->

   <title>Shopping Cart</title>

   <script>
      function addItem(item) {

      }
   </script>

</head>

<body>
   <header>
      <h1 style="padding-bottom: 5px; margin: 0px;">
         <p>Shopping Cart</p>
      </h1>
   </header>
   <ul style="width: 100%">
      <li><a id="Top" href="https://polar-plateau-20469.herokuapp.com/home.php">Home</a></li>
      <li><a href="https://polar-plateau-20469.herokuapp.com/index.php">More Websites</a></li>
      <li><a href="https://www.tripadvisor.com/Restaurants-g35583-Rexburg_Idaho.html">Food</a></li>
      <li><a href="http://www.byui.edu/canvas-authentication">Canvas</a></li>
      <li><a href="http://www.byui.edu/">BYUI Home</a></li>
   </ul>

   <input type="button" name="cart" value="View Cart" on click="">

   <?php
   session_start();
   // $_SESSION["firstname"] = "Peter";

   $items = $_SESSION["checklist"] = $_POST["checklist"];
   foreach ($items as $item) {
      $item_clean = htmlspecialchars($item);
      echo $item_clean;
      echo "<br>";
   }

   ?>


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>








<!-- if(isset($_SESSION["lastname"])){
unset($_SESSION["lastname"]);
} -->