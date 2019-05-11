<?php
session_start();
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
   <h5>Please Enter All Your Personal Information: </h5>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="shipping">Street Address: </label>
      <input type="text" name="shipping">
      <br>
      <label for="city">City: </label>
      <input type="text" name="city">
      <br>
      <label for="zip">Zip:</label>
      <input type="text" name="zip">
      <br>
      <input type="submit" value="Confirm address" name="submit">
   </form>

   <a href="viewcart.php"><input type="button" name="cart" value="Return to Cart" on click=""></a>
   <a href="purchase.php"><input type="button" name="cart" value="Puchase" on click=""></a>

   <?php
   // Declare Variables
   $shipping = "";
   $city = "";
   $zip = "";

   $shipping = $_POST["shipping"];
   $city = $_POST["city"];
   $zip = $_POST["zip"];

   echo $shipping;
   $_SESSION["shipping"] = $shipping;
   $_SESSION["city"] = $city;
   $_SESSION["zip"] = $zip;

   ?>

</body>

</html>