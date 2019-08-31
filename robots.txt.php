<?php
	require_once 'inc/includes.php';
	header("Content-Type: text/plain");

	echo 'User-agent: *' . PHP_EOL;
	echo trim(preg_replace('/\t+/', '', '
		Disallow: /inc
		Disallow: /template

		Sitemap: ' . $data->domain . '/sitemap.xml
	'));
?>