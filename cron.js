Parse.Cloud.httpRequest({
  url: 'http://files.parsetfss.com/0443df4f-003d-4529-a9b4-d6f75852e166/tfss-029d8b07-60b8-44e0-ad11-c77c359d607d-store.json'
}).then(function(httpResponse) {
  // success
  console.log(httpResponse.text);
},function(httpResponse) {
  // error
  console.error('Request failed with response code ' + httpResponse.status);
});