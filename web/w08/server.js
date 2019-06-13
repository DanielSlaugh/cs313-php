var http = require('http');

function sayHello(req, res){
   console.log("Recieved request for: " + req.url);

   res.write("Hello from server.js!!");
   res.end();
}

var server = http.createServer(sayHello);
server.listen(8888);

console.log("This server is listening on port 8888");