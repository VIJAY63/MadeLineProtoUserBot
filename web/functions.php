<?php
function startsWith($haystack, $needle) {
   $length = strlen($needle);
   return (substr($haystack, 0, $length) === $needle);
}

// <=> https://stackoverflow.com/a/834355/4723940

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

function ObjToJson($obj){
  return json_encode($obj);
}

function JsonToObj($json){
  // => http://webtutsdepot.com/2009/08/31/how-to-read-json-data-with-php/
  return json_decode($json, true);
}
