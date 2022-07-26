function encrypt(string) {
  let result = ""

  result = encodeURIComponent(string)

  // first type
  // string.split("").forEach(function(char) {
  //   result += char.charCodeAt(0)
  //   result += "%"
  // })

  // second type
  let regex = /(\w)/gim
  result = result.replaceAll(regex, function(match) {
    return "%" + match.charCodeAt(0) + "%"
  })

  // console.log("res: " + result);

  // result = encodeURIComponent(result)
  let arr = []
  result = result.replaceAll("%", function(match, index) {
    // console.log(index);
    arr.push(index)
    return ""
  })

  // console.log(arr);

  return {
    _setting: arr,
    data: result
  }
}





function decrypt(string) {
  let result = ""

  string._setting.forEach(function(value, index) {
    // index === 0 ?
    //   result = addToString(string.data, "%", value) :
    //   result = addToString(result, "%", value)
      result = addToString(index === 0 ? string.data : result, "%", value)
    // console.log(result);
  })

  // for (let i = 0; i < string.arr.length; i++) {
  //   i === 0 ?
  //     result = addToString(string.data, "%", string.arr[i]) :
  //     result = addToString(result, "%", string.arr[i])
  // }
  
  /*let regex = /(\%)(\d+)(\%)/gim
  result = result.replaceAll(regex, function(match, p0, p1) {
    return String.fromCharCode(p1)
  })

  result = decodeURIComponent(result)*/

  // console.log(result);
  // console.log()

  return result



  function addToString(string, insertText, index) {
    return string.slice(0, index) + insertText + string.slice(index)
  }
}
