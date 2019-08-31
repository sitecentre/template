<?php
	require_once 'inc/includes.php';

	$pages = $db->query("
		SELECT
		p.slug
		, p.seo_title
		, p.seo_description
		, p.title
		, p.description
		, p.content
		, p.custom_schema
		, p.last_modified
		, p.date_added
		, p.status
		FROM rh_pages p
		WHERE p.slug = '$slug'
		LIMIT 1
	");

	if($pages->num_rows == 0){
	    $status = '404';
	    include 'errors.php';
	    die();
	} else {
	    $page = $pages->fetch_object();
	}

	$pageStrlen = strlen($page->seo_title);

	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <title>🥇<?php if($pageStrlen >= 14){ echo $page->seo_title . ' {{info:industry}}: {{info:name:short}}'; } else { echo $page->seo_title . ' {{info:industry}}: {{info:name}}'; } ?></title>
	<meta name="description" content="<?php echo $page->seo_description; ?>">

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>

	<!-- Include Facebook, Twitter, Google Meta Tags - Follow instructions for Business Logo Specs -->
	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="{{info:name}}" />
    <meta property="og:title" content="<?php echo $page->title . ': {{info:name}}'; ?>" />
    <meta property="og:description" content="<?php echo $page->description; ?>">
    <meta property="og:url" content="{{domain}}/{{slug}}" />
    <meta property="og:image" content="<?php echo '{{domain}}/assets/images/pages/' . $page->slug . '.jpg'; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="825" />
    <meta property="og:image:height" content="464" />
    <meta property="og:image:alt" content="<?php echo $page->title; ?>" />

    <meta name="twitter:title" content="<?php echo $page->title . ': {{info:name}}'; ?>">
    <meta name="twitter:description" content="<?php echo $page->description; ?>">
    <meta name="twitter:image" content="<?php echo '{{domain}}/assets/images/pages/' . $page->slug . '.jpg'; ?>">
    <meta name="twitter:image:alt" content="<?php echo $page->title; ?>">
    <meta name="twitter:card" content="summary_large_image">

	<script type="application/ld+json">	
	    {
    		"@context": "https://schema.org",
    		"@graph": [
    		    {
    		        "@type": "WebPage",
                    "url": "{{domain}}/{{slug}}#WebPage",
                    "inLanguage": "en-AU",
                    "name": "<?php echo $page->title; ?>",
                    "description": "<?php echo $page->description; ?>",
                    "breadcrumb": "<?php echo ucwords(str_replace('-', ' ', str_replace('/', ' > ', $slug))); ?>",
                    "datePublished": "<?php echo date("c", strtotime($page->date_added)); ?>",
                    "dateModified": "<?php echo date("c", strtotime($page->last_modified)); ?>",
                    "lastReviewed": "<?php echo date("c", strtotime($page->last_modified)); ?>",
                    "image": "<?php echo '{{domain}}/assets/images/pages/' . $page->slug . '.jpg'; ?>",
                    "primaryImageOfPage": {
                        "@type": "ImageObject",
                        "name": "<?php echo '{{domain}}/assets/images/pages/' . $page->slug . '.jpg'; ?>",
                        "url": "<?php echo '{{domain}}/assets/images/pages/' . $page->slug . '.jpg'; ?>"
                    },
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
                    }
    		    }, {
                    "@type":"BreadcrumbList",
                    "itemListElement": {
                        "@type": "ListItem",
                        "position": 1,
                        "item": {
                            "@type": "WebPage",
                            "@id": "<?php echo '{{domain}}/' . $page->slug . '#WebPage'; ?>",
                            "name": "<?php echo $page->title; ?>"
                        }
                    }
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
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span><?php echo $page->title; ?></span></h1>
	                <p class="ml-3"><span><?php echo $page->description; ?></span></p>
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
    	            <?php echo $page->content; ?>
    	            
    	            <div class="extensions p-5 text-center">
    	                <h2 class="py-3">Popular Suburbs</h2>
    	                <ul>
    	                    <li><a href="{{domain}}/suburbs/caloundra" title="Caloundra Pest Control">Caloundra</a></li>
    	                    <li><a href="{{domain}}/suburbs/maroochydore" title="Maroochydore Pest Control">Maroochydore</a></li>
    	                    <li><a href="{{domain}}/suburbs/kawana-waters" title="Kawana Pest Control">Kawana Waters</a></li>
    	                    <li><a href="{{domain}}/suburbs/noosa" title="Noosa Pest Control">Noosa</a></li>
    	                    <li><a href="{{domain}}/suburbs/morayfield" title="Morayfield Pest Control">Morayfield</a></li>
    	                    <li><a href="{{domain}}/suburbs/aura" title="Aura Pest Control">Aura</a></li>
    	                </ul>
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