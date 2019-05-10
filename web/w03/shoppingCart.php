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
      // function addItem(item) {
      //    if ($(this).is(":checked")) {
      //       alert("Checkbox is checked.");
      //    }
      //    else if ($(this).is(":not(:checked)")){
      //       alert("Checkbox is unchecked.");
      //    }
      //    alert("Item added");
      // }
      $(document).ready(function() {
         $('input[type="checkbox"]').click(function() {
            if ($(this).prop("checked") == true) {
               alert("Checkbox is checked.");
            } else if ($(this).prop("checked") == false) {
               alert("Checkbox is unchecked.");
            }
         });
      });
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

   <div class="top-right">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         <table>
            <tr>
               <td><input type="image" name="broccoli" src="broccoli.jpg" alt="broc" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="broccoli" onclick="ready();" </td> </tr> <br>
            <tr>
               <td><input type="image" name="canta" src="canta.jpg" alt="cant" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="cantalope"></td>
            </tr>
            <br>
            <tr>
               <td>
                  <input type="image" name="life" src="life.jpg" alt="life" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="life"></td>
            </tr>
            <br>
            <tr>
               <td>
                  <input type="image" name="petunia" src="petunia.jpg" alt="pet" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="petunia"></td>
            </tr>
            <br>
            <tr>
               <td>
                  <input type="image" name="scooter" src="scooter.png" alt="scoot" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="scooter"></td>
            </tr>
            <br>
            <tr>
               <td>
                  <input type="image" name="wrench" src="wrench.jpg" alt="wrench" style="width:15%;">
                  <input id="north america" type="checkbox" name="checklist[]" value="wrench"></td>
            </tr>
         </table>
         <input type="submit" value="Add to Cart" name="submit">
      </form>
   </div>

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