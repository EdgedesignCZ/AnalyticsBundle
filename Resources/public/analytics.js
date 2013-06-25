var serialize = function(arr) {
  var i,j,str = [];
  for(i in arr){
    var p=arr[i],k=p[0],v=p[1];
    if(typeof v === 'object'){
        for(j in v){
            str.push(encodeURIComponent(k+'[]') + "=" + encodeURIComponent(v[j]));        
        }
    } else {
        str.push(encodeURIComponent(k) + "=" + encodeURIComponent(v));
    }
  }
  return str.join('&');
};

var ea = window[window.EdgeAnalyticsObject], params = ea.q, fparams=[],
method='POST',url='/collect',checksum=35,usecbt=true;

for(i in params){
    var p=params[i],k=p[0],v=p[1];
    if (k=='_url') {
        url=v; continue;
    }
    if (k=='_usecbt'){
        usecbt=((v===1||v==='1'||v==='true'||v==='on'||v===true) ? true : false); continue;
    } 
    if (k=='_checksum'){
        checksum=parseInt(v,10); continue;
    }
    fparams.push(p);
}

if(usecbt){
    cbt = Math.random().toString(36).substr(2);
    url = (url.indexOf('?') > 0) ? url+'&z='+cbt : url+'?z='+cbt;
}

var r = new XMLHttpRequest();
r.open(method, url, true);
r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
r.onreadystatechange = function() {
    if (r.readyState == 4 && (r.status != 200 || r.responseText.length !== checksum)){
        throw new Error("Server communication error! " 
        + method + " " + url + " => " + r.status 
        + " checksum: " + ((r.responseText.length !== checksum) ? 'fail':'ok' ));
    } 
};
r.send(serialize(fparams));
