<?php
// Gather current page URL eg. /page1/page2
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $domain = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $domain = 'http://' . $_SERVER['HTTP_HOST'];
}
$slug = strtok($_SERVER["REQUEST_URI"],'?');

// CDN - Do not use trailing forward slash.
$cdn = '';
if($cdn == ''){ $cdn = $domain; }


class template {
	function meta(){
	    global $domain;
	    global $cdn;
	    global $slug;

		require_once 'template/meta.php';
	}

	function menu(){
		require_once 'template/header.php';
	}

	function footer(){
	    global $cdn;
	    
		require_once 'template/footer.php';
		require_once 'template/modules.php';
	}

	function javascript() {
	    global $cdn;
	    
    	require_once 'template/javascript.php';
	}
}
$template = new template();

?>