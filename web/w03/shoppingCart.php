 <?php
   session_start();
   // $_SESSION["firstname" ] = "Peter";
   ?>

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

    </script>

 </head>

 <body>
    <header>
       <h1 style=" padding - bottom: 5 px;
                           margin: 0 px;
                           ">
          <p>Shopping Cart</p>
       </h1>
    </header>
    <ul style=" width: 100 % ">
       <li><a id=" Top " href=" https: //polar-plateau-20469.herokuapp.com/home.php">Home</a></li>
                           < li > < a hre f ="https://polar-plateau-20469.herokuapp.com/index.php " >More Websit e s < / a > </ li>
                               < l i ><a h r ef="https://www.tripadvisor.com/Restaurants-g35583-Rexburg_Idaho.ht m l">F o o d < / a >< /li>
                                < l i><a  h ref="http://www.byui.edu/canvas-authenticat i on">Ca n v a s < / a> </li>
                                 < li><a   href="http://www.byui. e du/">BYU I   H o m e </ a></li>
                                </ul>

                              <di v  class="top -right">
                               <form   method="post"   action="<?php echo htmlspecia lchars($ _SERVER["P HP_SELF"]); ?>">
          <table>
             <tr>
                <td><input type="image" name="broccoli" src="broccoli.jpg" alt="broc" style="width:15%;">
                   <input id="check01" type="checkbox" name="checklist[]" value="broccoli" onclick="addItem()">
                </td>
             </tr> <br>
             <tr>
                <td><input type="image" name="canta" src="canta.jpg" alt="cant" style="width:15%;">
                   <input id="check02" type="checkbox" name="checklist[]" value="cantalope"></td>
             </tr>
             <br>
             <tr>
                <td>
                   <input type="image" name="life" src="life.jpg" alt="life" style="width:15%;">
                   <input id="check03" type="checkbox" name="checklist[]" value="life"></td>
             </tr>
             <br>
             <tr>
                <td>
                   <input type="image" name="petunia" src="petunia.jpg" alt="pet" style="width:15%;">
                   <input id="check04" type="checkbox" name="checklist[]" value="petunia"></td>
             </tr>
             <br>
             <tr>
                <td>
                   <input type="image" name="scooter" src="scooter.png" alt="scoot" style="width:15%;">
                   <input id="check05" type="checkbox" name="checklist[]" value="scooter"></td>
             </tr>
             <br>
             <tr>
                <td>
                   <input type="image" name="wrench" src="wrench.jpg" alt="wrench" style="width:15%;">
                   <input id="check06" type="checkbox" name="checklist[]" value="wrench"></td>
             </tr>
          </table>
          <input type="submit" value="Add to Cart" name="submit">
       </form>
    </div>

    <input type="button" name="cart" value="View Cart" on click="">

    <?php
      // Set session variables
      $_SESSION["favcolor"] = "green";
      $_SESSION["favanimal"] = "cat";


      // $items =  $_POST["checklist"];
      // foreach ($items as $item) {
      //    $item_clean = htmlspecialchars($item);
      //    echo $item_clean;
      //    // $_SESSION["$item"] = $item_clean;
      //    echo "<br>";
      //    // echo $_SESSION["$item"];
      //    echo "<br>";
      // }

      echo "Session variables are: " . ".<br>";
      // echo $_SESSION["broccoli"]     . ".<br>";
      foreach ($_SESSION as $key => $val)
         echo $key . " " . $val . "<br/>";
      // echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";



      ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>

 </html>