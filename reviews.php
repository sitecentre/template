<?php
	require_once 'inc/includes.php';

	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
	<title>{{info:name}} Reviews</title>
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
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span>Our Reviews</span></h1>
	                <p class="ml-3"><span>Customers love {{info:name}} - See what they have to say</span></p>
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
	                
    	        </div>
        	</div>
	    </div>
	</section>

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>
<?php $process->end(); ?>