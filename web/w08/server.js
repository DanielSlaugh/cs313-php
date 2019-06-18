var http = require('http');
var fs = require('fs');

function sayHello(req, res){
   console.log("Recieved request for: " + req.url);

   if (req.url === '/home'){
      fs.readFile('welcome.html', function (err, data) {
         res.writeHead(200, { 'Content-Type': 'text/plain' });
         res.write(data);
         res.end();
      });
   }
   else if (req.url === '/getData') {
      res.writeHead(200, { 'Content-Type': 'text/plain' });
      res.write('{"name":"Daniel Slaugh","class":"cs313"}');
      res.end();
   }
   else {
      res.writeHead(404, { 'Content-Type': 'text/plain' });
      res.write("Error page");
      res.end();
   }
}

var server = http.createServer(sayHello);
server.listen(8888);

console.log("This server is listening on port 8888");