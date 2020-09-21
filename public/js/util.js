function gup( name, url ) {
  if (!url) url = location.href;
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( url );
  return results == null ? null : results[1];
}

function classChange(element, oldClassName, newClassName) {
  if (!element || !element.classList) {
    return false;
  }
  element.classList.remove(oldClassName);
  element.classList.add(newClassName);
}

function classAdd(element, className) {
  if (!element || !element.classList) {
    return false;
  }
  element.classList.add(className);
}

function classRemove(element, className) {
  if (!element || !element.classList) {
    return false;
  }
  element.classList.remove(className);
}

function showMessage(message) {
  var e = window.message;
  if (!e) {
    alert(error);
    return;
  }
  classChange(e, "error","message");
  show(e, "hidden","show");
  e.innerHTML = message;
}

function showError(error) {
  var e = window.message;
  if (!e) {
    alert(error);
    return;
  }
  classChange(e, "message","error");
  show(e, "hidden","show");
  e.innerHTML = error;
}

function processResult(result, status=200) {
  var text;
  if (result.message) {
    text = result.message;
  }
  else if (result.error) {
    text = result.error;
  }
  else {
    text = 'Não foi possível redefinir a senha.';
  }
  if (status==200) {
    showMessage(text);
  }
  else {
    showError(text);
  }
}

function processError(error, message) {
  if (error && error.responseJSON) {
    processResult(error.responseJSON, error.statusCode);
  }
  else {
    var complement = !error ? 'Request failed.' : error.responseText;
    showError("<strong>"+message+": </strong><br><br>"+complement);
  }
}

function parseJwtPayload(token) {
  if (typeof token!=='string') {
    return false;
  }
  var tokenParts = token.split('.');

  if (tokenParts.length<3) {
    return false;
  }

  var payload = atob(tokenParts[1]);

  result = JSON.parse(payload);

  return result;
}

function setCookie(cname, cvalue, ex, path) {
  blocks = [];

  if (!cname) {
    return false;
  }

  blocks.push(cname + "=" + cvalue);
  
  if (ex) {
    var t = {}
    t.u = 1;
    t.s = 1000 * t.u;
    t.i = 60 * t.s;
    t.h = 60 * t.i;
    t.d = 24 * t.h;
    t.m = 30 * t.d;
    t.a = 365 * t.d;
    
    var un = t[ex.slice(-1)];
    
    if (un) {
      vl = ex.slice(0, -1);

      exp = vl * un;
      if (exp) {
        var dt = new Date();
        //dt.setTime(dt.getTime() + (exdays * 24 * 60 * 60 * 1000));
        dt.setTime(dt.getTime() + exp);
        var expires = "expires="+dt.toUTCString();

        blocks.push(expires);
      }
    }
  }

  //path = path || "/";
  if (path) {
    blocks.push("path="+path);
  }

  //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  var cookie = blocks.join(";");
  document.cookie = cookie;

  return cookie;
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function removeCookie(cname, path) {
  path = path || "/";
  document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path="+path+";";
}

function show(element) {
  classChange(element, "hidden", "show"); 
}

function hidden(element) {
  classChange(element, "show", "hidden"); 
}
