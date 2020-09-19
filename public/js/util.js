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
  classChange(e, "hidden","show");
  e.innerHTML = message;
}

function showError(error) {
  var e = window.message;
  if (!e) {
    alert(error);
    return;
  }
  classChange(e, "message","error");
  classChange(e, "hidden","show");
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