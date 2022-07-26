<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="assets/lib/eruda/eruda.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8">
    eruda.init();
  </script>
</head>
<body>
  <div id="app" style="border: 1px solid red;"></div>

  <!-- <script src="assets/lib/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
  <script src="assets/lib/encryption.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8">
    const app = document.getElementById('app');
    //app.append("<p>" + decrypt(encrypt('msm')) + "</p>")
    let msm = encrypt('saleh');
    console.log(JSON.stringify(msm));
    //console.log(decrypt(msm));
  </script>
</body>
</html>

<?php
//decrypt(in_js('app.append(encrypt("msm").data)'));

// msm => {"_setting":[0,4,5,9,10,14],"data":"109115109"}
// msm => {"_setting":[0,4,5,8,9,13,14,18,19,23],"data":"11597108101104"}
// urldecode(string $string): string

//decrypt('{"_setting":[0,4,5,9,10,14],"data":"109115109"}');
decrypt('{"_setting":[0,4,5,8,9,13,14,18,19,23],"data":"11597108101104"}');




function decrypt($text) {
  $text = (array) json_decode($text);
  $res = "";
  //$regex = '/(\%)(\d+)(\%)/gim';
  $regex = '/(\%)(\d+)(\%)/';
echo '<pre>';
print_r($text);
//var_dump(str_split($text));
foreach ($text['_setting'] as $key => $value) {
  //$res = substr($text['data'],0,$value) . "." . substr($text['data'],$value,-1) . "\n";
  //$res = substr($text['data'],$value) . "\n";
  $key === 0 ?
  $res = substr($text['data'],0,$value) . '%' . substr($text['data'],$value):
  $res = substr($res,0,$value) . '%'  . substr($res,$value);
  //print_r("$key => $res\n");
}
//print_r(preg_match_all($regex,$res,$matches,PREG_PATTERN_ORDER));
//print_r($matches[0]);
foreach ($matches[0] as $key => $value) {
  
}
echo '</pre>';
}

function in_js($script) {
return '<script>' . $script . '</script>';
}