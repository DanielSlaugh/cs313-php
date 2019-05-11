<?php
session_start();

// $broccoli = $_SESSION["broccoli"];

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
   <h5>Here are your items:</h5>
   <h5><?php foreach ($_SESSION as $key => $val) {
            echo $val . "<br/>";
         } ?></h5>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h5>Remove items?</h5><br>
      <br>
      <label>broccoli</label>
      <input id="check05" type="checkbox" name="checklist[]" value="broccoli"></td>
      <br>
      <label>Cantalope</label>
      <input id="check05" type="checkbox" name="checklist[]" value="cantalope"></td>
      <br>
      <label>Life</label>
      <input id="check05" type="checkbox" name="checklist[]" value="life"></td>
      <br>
      <label>Petunia</label>
      <input id="check05" type="checkbox" name="checklist[]" value="petunia"></td>
      <br>
      <label>Scooter</label>
      <input id="check05" type="checkbox" name="checklist[]" value="scooter"></td>
      <br>
      <label>Wrench</label>
      <input id="check05" type="checkbox" name="checklist[]" value="wrench"></td>
      <br>
      <input type="submit" value="Confirm Removal" name="submit">
   </form>
   <a href="shoppingCart.php"><input type="button" name="cart" value="Continue Shopping" on click=""></a>
   <a href="checkout.php"><input type="button" name="cart" value="Proceed to Checkout" on click=""></a>


   <?php

   $items =  $_POST["checklist"];
   foreach ($items as $item) {
      $item_clean = htmlspecialchars($item);
      if ($_SESSION["$item"] == $item_clean) {
         unset($_SESSION["$item"]);
      }
      echo "<br>";
   }
   if (isset($_POST['submit'])) {
      header("Location: viewcart.php");
   }
   // foreach ($_SESSION as $key => $val) {
   //    echo $val . "<br/>";
   // }

   ?>
</body>

</html>







<!-- if(isset($_SESSION["lastname"])){
unset($_SESSION["lastname"]);
} -->