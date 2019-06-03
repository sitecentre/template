<?php
	require_once 'inc/includes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Page Name: Business Name</title>
	<meta name="description" content="">

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>

	<!-- Include Facebook, Twitter, Google Meta Tags - Follow instructions for Business Logo Specs -->
	<meta property="og:locale" content="en_AU" />
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="sitecentre">
    <meta property="og:description" content="">
    <meta property="og:url" content="<?php echo $domain . '/'; ?>">
    <meta property="og:image" content="<?php echo $domain . '/assets/images/logo.png'; ?>">
    <meta property="business:contact_data:phone_number" content="+61 1300 755 306">
    <meta property="business:contact_data:website" content="<?php echo $domain . '/'; ?>">
    <meta property="business:contact_data:email" content="hello@sitecentre.com.au">
    <meta property="business:contact_data:street_address" content="PO Box 290">
    <meta property="business:contact_data:locality" content="Caloundra">
    <meta property="business:contact_data:region" content="QLD">
    <meta property="business:contact_data:postal_code" content="4551">
    <meta property="business:contact_data:country_name" content="Australia">
    <meta property="place:location:latitude" content="-26.797909" />
    <meta property="place:location:longitude" content="153.123200" />
	<script type="application/ld+json">
    	{
    	    "@context": "http://schema.org/",
    	    "@type": "Service",
    	    "name": "Sunshine Coast Digital Marketing Agency",
    	    "areaServed": "Sunshine Coast, Brisbane, Melbourne, Hawthorn, Australia",
    	    "audience": {
    	        "@type":"Audience",
    	        "audienceType":"Business Owners"
    	    },
    	    "brand":"sitecentre",
    	    "category":"Marketing",
    	    "serviceOutput":"Digital Marketing",
    	    "serviceType":[
    	        "Digital Marketing",
    	        "Local SEO",
    	        "PPC Management",
    	        "Web Hosting",
    	        "Website Design",
    	        "Domain Management",
    	        "SSL Certificates",
    	        "Social Media Marketing"
           ],
           "alternateName":"sitecentre",
           "description":"",
           "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo $domain . '/'; ?>"
           }
    	}
    </script>
</head>
<body>
	<?php $template->menu(); ?>
	
	<!-- Main website html here -->

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>