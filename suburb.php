<?php
	require_once 'inc/includes.php';

	$suburbs = $db->query("
		SELECT
		s.slug
		, s.suburb_name
		, s.suburb_postcode
		, s.content
		, s.map
		, s.state
		, s.display_name
		, s.lat
		, s.lon
		, s.region
		, s.sameAs
		, s.last_modified
		, s.date_added
		, s.status
		FROM rh_suburbs s
		WHERE s.slug = '$slug'
		LIMIT 1
	");
	if($suburbs->num_rows == 0){
	    $status = '404';
	    include 'errors.php';
	    die();
	} else {
	    $suburb = $suburbs->fetch_object();
	}

	$suburbStrlen = strlen($suburb->suburb_name);

	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
	<title>🥇<?php if($suburbStrlen >= 14){ echo $suburb->suburb_name . ' {{info:industry}} (from $49): {{info:name:short}}'; } else { echo $suburb->suburb_name . ' {{info:industry}} (from $49): {{info:name}}'; } ?></title>
	<meta name="description" content="<?php echo 'Looking for {{info:industry}} services in ' . $suburb->suburb_name . '? We\'re your local expert. ☎ Call ' , phonefix($data->b_phone, 'pretty') , ' Today. ' . $suburb->suburb_name . ' {{info:industry}} Services from $49.'; ?>">

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="place" />
	<meta property="og:site_name" content="{{info:name}}" />
    <meta property="og:title" content="<?php echo $suburb->suburb_name . ': {{info:name}}'; ?>" />
    <meta property="og:description" content="<?php echo 'Looking for {{info:industry}} services in ' . $suburb->suburb_name . '? We\'re your local expert. ☎ Call ' , phonefix($data->b_phone, 'pretty') , ' Today. ' . $suburb->suburb_name . ' {{info:industry}} Services from $49.'; ?>">
    <meta property="og:url" content="{{domain}}/{{slug}}" />
    <meta property="og:image" content="<?php echo '{{domain}}/assets/images/' . $suburb->slug . '.jpg'; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="825" />
    <meta property="og:image:height" content="464" />
    <meta property="og:image:alt" content="<?php echo $suburb->suburb_name; ?>" />

    <meta name="twitter:title" content="<?php echo $suburb->suburb_name . ': {{info:name}}'; ?>">
    <meta name="twitter:description" content="<?php echo 'Looking for {{info:industry}} services in ' . $suburb->suburb_name . '? We\'re your local expert. ☎ Call ' , phonefix($data->b_phone, 'pretty') , ' Today. ' . $suburb->suburb_name . ' {{info:industry}} Services from $49.'; ?>">
    <meta name="twitter:image" content="<?php echo '{{domain}}/assets/images/' . $suburb->slug . '.jpg'; ?>">
    <meta name="twitter:image:alt" content="<?php echo $suburb->suburb_name; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="place:location:latitude" content="{{info:lat}}" />
	<meta property="place:location:longitude" content="{{info:lon}}" />

	<script type="application/ld+json">	
	    {
    		"@context": "https://schema.org",
    		"@graph": [
    		    {
    		        "@type": "WebPage",
                    "url": "{{domain}}/{{slug}}#WebPage",
                    "inLanguage": "en-AU",
                    "name": "<?php echo $suburb->suburb_name; ?>",
                    "description": "<?php echo 'Looking for {{info:industry}} services in ' . $suburb->suburb_name . '? We\'re your local expert. ☎ Call ' , phonefix($data->b_phone, 'pretty') , ' Today. ' . $suburb->suburb_name . ' {{info:industry}} Services from $49.'; ?>",
                    "breadcrumb": "<?php echo ucwords(str_replace('-', ' ', str_replace('/', ' > ', $slug))); ?>",
                    "datePublished": "<?php echo date("c", strtotime($suburb->date_added)); ?>",
                    "dateModified": "<?php echo date("c", strtotime($suburb->last_modified)); ?>",
                    "lastReviewed": "<?php echo date("c", strtotime($suburb->last_modified)); ?>",
                    "primaryImageOfPage": "<?php echo '{{domain}}/assets/images/' . $suburb->slug . '.jpg'; ?>",
                    "publisher": {
                        "@type": "{{schemaType}}",
                        "@id": "{{domain}}/#{{schemaType}}",
                        "name": "{{info:name}}",
                        "image": "{{domain}}/assets/images/logo-500x500.png",
                        "telephone": "<?php phonefix($data->b_phone, 'schema'); ?>",
                        "priceRange": "$49 - $249",
                        "address": {
                			"@type": "PostalAddress",
                			"streetAddress": "{{info:street}}",
                			"addressLocality": "{{info:suburb}}",
                			"addressRegion": "{{info:state}}",
                			"postalCode": "{{info:postcode}}",
                			"addressCountry": {
                			    "@type": "Country",
                			    "name": "{{info:country:short}}"
                			}
                		}
                    },
                    "speakable": {
                        "@type": "SpeakableSpecification",
                        "cssSelector": "speakable"
                    },
                    "isPartOf": {
                        "@type": "WebSite",
                        "@id": "{{domain}}/#WebSite"
                    },
                    "mainEntity": {
                        "@type": "Place",
                        "@id": "{{domain}}/{{slug}}#Place"
                    }
    		    }, {
    		        "@type": "Place",
                    "name": "<?php echo $suburb->suburb_name . ', ' . $suburb->state . ' ' . $suburb->suburb_postcode; ?>",
                    "url": "{{domain}}/{{slug}}#Place",
                    "image": "<?php echo '{{domain}}/assets/images/' . $suburb->slug . '.jpg'; ?>",
                    "sameAs": [
                        <?php echo $suburb->sameAs; ?>
                    ],
                    "geo": {
                        "@type": "GeoCoordinates",
                        "latitude": "{{info:lat}}",
                        "longitude": "{{info:lon}}"
                    }
    		    }, {
                    "@type":"BreadcrumbList",
                    "itemListElement": [
                        {
                            "@type": "ListItem",
                            "position": 1,
                            "item": {
                                "@type": "WebPage",
                                "@id": "{{domain}}/suburbs#WebPage",
                                "name": "Suburbs"
                            }
                        }, {
                            "@type": "ListItem",
                            "position": 2,
                            "item": {
                                "@type": "WebPage",
                                "@id": "{{domain}}/{{slug}}#WebPage",
                                "name": "<?php echo $suburb->suburb_name; ?>"
                            }
                        }
                    ]
    		    }
    		]
    	}
    </script>
</head>
<body>
	<?php $template->menu(); ?>

	<!-- Main website html here -->
	<section id="page-header">
	    <div class="container">
	        <div class="row d-flex align-items-center">
	            <div class="col-12 col-md-9 py-5">
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span><?php echo $suburb->suburb_name . ' {{info:industry}}'; ?></span></h1>
	                <p class="ml-3"><span><?php echo 'Your local {{info:industry}} Professional in ' . $suburb->suburb_name . ', ' . $suburb->suburb_postcode . '.'; ?></span></p>
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
	            <div class="col-lg-3 col-md-4 col-12 py-0 py-md-3">
	                <?php require_once 'template/left-menu.php'; ?>
    	        </div>

	            <div class="col-lg-9 col-md-8 col-12 py-3 speakable">
    	            <?php echo $suburb->content; ?>
    	        </div>
        	</div>
	    </div>
	</section>

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>
<?php $process->end(); ?>