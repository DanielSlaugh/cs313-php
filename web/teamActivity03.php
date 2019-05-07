<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <form>
      <label for="Name">Name: </label>
      <input type="text" name="Name">
      <br>
      <label for="Email">Email: </label>
      <input type="text" name="Email">
      <br>
      <label for="major">Major:</label>
      <select id="major" name="major">
      <br>
      <option value="cs">Computer Science</option>
      <option value="wwd">Web Design and Development</option>
      <option value="cit">Computer Information tech</option>
      <option value="ce">Computer engineering</option>
      </select>
      <br>
      <label for="comments" rows="5" cols="40">Comments:</label>
      <input type="textarea" name="comments">
   </form>
</body>
</html>