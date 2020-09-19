API = {
  url: '',
  post(route, options, jwt) {
    this.request('POST', route, options, jwt);
  },
  put(route, options, jwt) {
    this.request('PUT', route, options, jwt);
  },
  get(route, options, jwt) {
    this.request('GET', route, options, jwt);
  },
  postToken(route, options, paramToken) {
    token = paramToken ? paramToken : 'token';
    jwt = gup(token);
    this.post(route, options, jwt);
  },
  putToken(route, options, paramToken) {
    token = paramToken ? paramToken : 'token';
    jwt = gup(token);
    this.put(route, options, jwt);
  },
  getToken(route, options, paramToken) {
    token = paramToken ? paramToken : 'token';
    jwt = gup(token);
    this.get(route, options, jwt);
  },
  request(method, route, options, jwt) {
    options = options || {};
    options.method = method || options.method || 'POST';
    options.dataType = options.dataType || 'json';
    options.async = options.async || true;
    options.crossDomain = true;
    var headers = {};
    if (jwt) {
      headers['Authorization'] = 'Bearer '+jwt;
    };
    if (headers) {
      options.headers = headers;
    }
    var url = (this.url || options.url || "") + route;
    $.ajax(url, options);
  }
}
