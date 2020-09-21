API = {
  url: '',
  get(route, options, jwt) {
    this.request('GET', route, options, jwt);
  },
  post(route, options, jwt) {
    this.request('POST', route, options, jwt);
  },
  put(route, options, jwt) {
    this.request('PUT', route, options, jwt);
  },
  delete(route, options, jwt) {
    this.request('DELETE', route, options, jwt);
  },
  getToken(route, options, paramToken) {
    this.requestToken('GET', route, options, paramToken);
  },
  postToken(route, options, paramToken) {
    this.requestToken('POST', route, options, paramToken);
  },
  putToken(route, options, paramToken) {
    this.requestToken('PUT', route, options, paramToken);
  },
  deleteToken(route, options, paramToken) {
    this.requestToken('DELETE', route, options, paramToken);
  },
  requestToken(method, route, options, paramToken) {
    token = paramToken ? paramToken : 'token';
    jwt = gup(token);
    this.request(method, route, options, jwt);
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
