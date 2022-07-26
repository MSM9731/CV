function getSearch(url) {
  if (url === undefined) url = location.href;
  const result = new Object();
  let urlArr = url.split("?");
  if (urlArr.length < 2) return false;
  let search = urlArr[1];
  searchArr = search.split("&");
  searchArr.forEach(function(item, index) {
    itemArr = item.split("=");
    result[itemArr[0]] = itemArr[1];
  });
  return result;
}