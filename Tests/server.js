var express = require('express');
var app = express();

app.get('/', function(req, res){
  res.sendfile('./index.html');
});

app.get('/analyticsjs', function(req, res){
  res.sendfile('./analytics.js');
});

app.get('/analyticsminjs', function(req, res){
  res.sendfile('./analytics.min.js');
});

app.post('/collect', function(req, res){
  res.sendfile('./ea.gif');
});

app.listen(4000);
console.log('Listening on http://localhost:4000');