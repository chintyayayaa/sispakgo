<?php
defined("BASEPATH") OR exit("no direct access allowed");
if (isset($head) && $head != null) {
	require_once($head);
} else {
	require_once('head.php');
}
require_once($nav);
require_once('content.php');
if (isset($footer) && $footer != null) {
	require_once($footer);
} else {
	require_once('footer.php');
}