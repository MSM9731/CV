const xhr = new XMLHttpRequest();
xhr.addEventListener("load", function () {
  if (xhr.responseText === "") return;
  let response = JSON.parse(xhr.responseText)
  postMessage(makeResponse(response.status, response.message));
  // postMessage(makeResponse('success', xhr.responseText));
});

addEventListener("message", function (e) {
  if (e.data === '' || e.data === null) {
    postMessage(makeResponse('warn', 'You have nothing to request'));
    return;
  }
  // if (e.data.table === "" || e.data.query === "") {
  if (e.data.query === "") {
    // postMessage(e.data);
    postMessage(makeResponse('warn', 'You don\'t specified your table or You have no query'))
    return;
  }
  xhr.open('POST', '../getDatabaseInfo.php', false);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
  xhr.setRequestHeader("Accept", "*/*");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send("query=" + e.data.query);
  // xhr.send("table=" + e.data.table + "&query=" + e.data.query);
});







function makeResponse(status, message) {
  return {
    status: status,
    message: message
  };
}