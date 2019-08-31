<?php 
    require_once 'inc/includes.php';
	header("Content-type: application/xml");
	echo '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL;
?>

<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
		<loc><?php echo $data->domain . '/'; ?></loc>
		<changefreq>weekly</changefreq>
		<priority>1.00</priority>
	</url>
	<?php
		// Get the latest pages
		$pages = $db->query("
			SELECT slug,
			last_modified
			FROM rh_pages
			WHERE status = '1'
		");
		while ($page = $pages->fetch_object()) {
			echo '<url>' . PHP_EOL;
			echo '<loc>' . $data->domain . '/' .$page->slug . '</loc>' . PHP_EOL;
			echo '<changefreq>monthly</changefreq>' . PHP_EOL;
			echo '<lastmod>' . date("c", strtotime($page->last_modified)) . '</lastmod>' . PHP_EOL;
			echo '<priority>0.9</priority>' . PHP_EOL;
			echo '</url>' . PHP_EOL;
		} $pages->close();
		
		
		// Get the latest services
		$services = $db->query("
			SELECT slug,
			last_modified
			FROM rh_services
			WHERE status = '1'
		");
		while ($service = $services->fetch_object()) {
			echo '<url>' . PHP_EOL;
			echo '<loc>' . $data->domain . '/' .$service->slug . '</loc>' . PHP_EOL;
			echo '<changefreq>monthly</changefreq>' . PHP_EOL;
			echo '<lastmod>' . date("c", strtotime($service->last_modified)) . '</lastmod>' . PHP_EOL;
			echo '<priority>0.8</priority>' . PHP_EOL;
			echo '</url>' . PHP_EOL;
		} $services->close();
		
		// Get the latest suburbs
		$suburbs = $db->query("
			SELECT slug,
			last_modified
			FROM rh_suburbs
			WHERE status = '1'
		");
		while ($suburb = $suburbs->fetch_object()) {
			echo '<url>' . PHP_EOL;
			echo '<loc>' . $data->domain . '/' .$suburb->slug . '</loc>' . PHP_EOL;
			echo '<changefreq>monthly</changefreq>' . PHP_EOL;
			echo '<lastmod>' . date("c", strtotime($suburb->last_modified)) . '</lastmod>' . PHP_EOL;
			echo '<priority>0.7</priority>' . PHP_EOL;
			echo '</url>' . PHP_EOL;
		} $suburbs->close();
	?>
</urlset>