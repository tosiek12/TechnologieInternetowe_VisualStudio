<?php
require_once 'Functions.php';

function includeHeader() {
  if(isAdmin()) {
    include 'templates/header.html.php';
  } else {
    include 'templates/headerRestricted.html.php';
  }
}
?>