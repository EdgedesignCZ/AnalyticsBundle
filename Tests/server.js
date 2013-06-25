var express = require('express');
var path = require('path');
var app = express();

var root = path.resolve(__dirname + '/../Resources/public');

app.get('/', function(req, res){
  res.sendfile('./index.html');
});

app.get('/analyticsjs', function(req, res){
  res.sendfile(root + '/analytics.js');
});

app.get('/analyticsminjs', function(req, res){
  res.sendfile(root + '/analytics.min.js');
});

app.post('/collect', function(req, res){
  res.sendfile(root + '/ea.gif');
});

app.listen(4000);
console.log('Listening on http://localhost:4000');