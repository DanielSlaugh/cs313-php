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
   <h5>Remove items?</h5><br>
   <label>broccoli</label>
   <input id="check05" type="checkbox" name="checklist[]" value="broccoli"></td>
   <label>Cantalope</label>
   <input id="check05" type="checkbox" name="checklist[]" value="cantalope"></td>
   <label>Life</label>
   <input id="check05" type="checkbox" name="checklist[]" value="life"></td>
   <label>Petunia</label>
   <input id="check05" type="checkbox" name="checklist[]" value="petunia"></td>
   <label>Scooter</label>
   <input id="check05" type="checkbox" name="checklist[]" value="scooter"></td>
   <label>Wrench</label>
   <input id="check05" type="checkbox" name="checklist[]" value="wrench"></td>

   <a href="shoppingCart.php"><input type="button" name="cart" value="Continue Shopping" on click=""></a>
   <a href="checkout.php"><input type="button" name="cart" value="Proceed to Checkout" on click=""></a>

</body>

</html>







<!-- if(isset($_SESSION["lastname"])){
unset($_SESSION["lastname"]);
} -->