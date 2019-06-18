// const express = require('express')
// const app = express()
// const port = 3000

// app.get('/', (req, res) => res.send('Hello World!'))

// app.listen(port, () => console.log(`Example app listening on port ${port}!`))
var express = require("express");

var app = express();

app.use(express.static("public"));

app.set("views", "myapp/views");
app.set("view engine", "ejs");

app.get("/", function (req, res) {
   console.log("Received a request for /");

   res.write("This is the root.");
   res.end();
});

app.get("/home", function (req, res) {
   // Controller
   console.log("Received a request for the home page");
   var name = getCurrentLoggedInUserAccount();
   var emailAddress = "john@email.com";

   var params = { username: name, email: emailAddress };

   res.render("home", params);
});

app.listen(5000, function () {
   console.log("The server is up and listening on port 5000");
});

// Model

function getCurrentLoggedInUserAccount() {
   // access the database
   // make sure they have permission to be on the site

   return "John";
}