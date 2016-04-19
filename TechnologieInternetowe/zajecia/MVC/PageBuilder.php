<?php
require_once 'Functions.php';

function includeHeader() {
  $path;
  
  if(isMobile()) {
    $path = 'templates/mobile/';
  } else {
    $path = 'templates/';
  }

  if(isAdmin()) {
    include ($path.'header.html.php');
  } else {
    include($path.'headerRestricted.html.php');
  }
}
function includeFooter() {
  $path;
  
  if(isMobile()) {
    $path = 'templates/mobile/';
  } else {
    $path = 'templates/';
  }

  include ($path.'footer.html.php');
}

?>