<?php
	require_once 'inc/includes.php';

	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
	<title>{{info:name}} Sitemap</title>
	<meta name="description" content="">
    
    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>
</head>
<body>
	<?php $template->menu(); ?>

	<!-- Main website html here -->
	<section id="page-header">
	    <div class="container">
	        <div class="row d-flex align-items-center">
	            <div class="col-12 col-md-9 py-5">
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span>Sitemap</span></h1>
	                <p class="ml-3"><span>A complete list of pages on our website.</span></p>
	            </div>
	            <div class="col-12 col-md-3 page-icons mb-4 mb-md-0 text-center d-flex justify-content-center justify-content-md-end">
	                <div class="mr-4">
	                    <i class="safe-products mb-md-2 mb-0 mr-md-0 mr-2"></i>
	                    <span>Safe <br>Products</span>
	                </div>
	                <div class="mr-4">
	                    <i class="upfront-pricing mb-md-2 mb-0 mr-md-0 mr-2"></i>
	                    <span>Upfront <br>Pricing</span>
	                </div>
	                <div>
	                    <i class="rapid-response mb-md-2 mb-0 mr-md-0 mr-2"></i>
	                    <span>Rapid <br>Response</span>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<section id="page">
	    <div class="container">
	        <div class="row py-3">
	            <div class="col-12 py-3 speakable">
	                <div class="three-column-split">
                        <a href="{{domain}}/" title="{{info:name}} Home Page">{{info:name}}</a><br>
                        <a href="{{domain}}/privacy-policy" title="Privacy Policy">Privacy Policy</a><br>
                        <a href="{{domain}}/terms-of-use" title="Terms of Use">Terms of Use</a><br>
                        <a href="{{domain}}/faq" title="Frequently Asked Questions">Frequently Asked Questions</a><br>
                        <a href="{{domain}}/contact-us" title="Contact Us">Contact Us</a><br>
                        <a href="{{domain}}/reviews" title="Our Reviews">Our Reviews</a><br>
                        <a href="{{domain}}/sitemap.xml" title="XML Sitemap">XML Sitemap</a><br>
        	            <?php
                    		// Get the latest pages
                    		$pages = $db->query("
                    			SELECT slug
                    			, title
                    			FROM rh_pages
                    			WHERE status = '1'
                    		");
                    		while ($page = $pages->fetch_object()) {
                    			echo '<a href="' . $data->domain . '/' . $page->slug . '" title="' . $page->title . '">' . $page->title . '</a><br>';
                    		} $pages->close();
                    		
                    		
                    		// Get the latest services
                    		$services = $db->query("
                    			SELECT slug
                    			, name
                    			FROM rh_services
                    			WHERE status = '1'
                    		");
                    		while ($service = $services->fetch_object()) {
                    			echo '<a href="' . $data->domain . '/' . $service->slug . '" title="' . $service->name . '">' . $service->name . '</a><br>';
                    		} $services->close();
                    		
                    		// Get the latest suburbs
                    		$suburbs = $db->query("
                    			SELECT slug
                    			, suburb_name
                    			FROM rh_suburbs
                    			WHERE status = '1'
                    		");
                    		while ($suburb = $suburbs->fetch_object()) {
                    			echo '<a href="' . $data->domain . '/' . $suburb->slug . '" title="' . $suburb->suburb_name . ' {{info:industry}}">' . $suburb->suburb_name . '</a><br>';
                    		} $suburbs->close();
                    	?>
                    </div>
    	        </div>
        	</div>
	    </div>
	</section>

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>
<?php $process->end(); ?>