<?php
	require_once 'inc/includes.php';

	$faqs = $db->query("
    	SELECT
    	faq.question
    	, faq.answer
    	FROM rh_faq faq
    	WHERE status = '1'
    ");

    $sfaq = '';
    $faq_count = 0;
    while ($faq = $faqs->fetch_object()) {
        $faq_count++;
        if($faq_count == 1) { $first = 'true'; $firsta = ' show'; } else { $first = 'false'; $firsta = ''; }
        if($faqs->num_rows !== 1 && $faqs->num_rows !== $faq_count){ $next = ','; } else { $next = ''; }
		$sfaq .= '
		{
            "@type": "Question",
            "name": "' . $faq->question . '",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "' . $faq->answer . '"
            }
        }' . $next . PHP_EOL;
        
        $dfaq .= '
        <div class="card">
            <div class="card-header" id="heading' . $faq_count . '">
                <button class="collapsed p-3" type="button" data-toggle="collapse" data-target="#collapse' . $faq_count . '" aria-expanded="' . $first . '" aria-controls="collapse' . $faq_count . '">
                    ' . $faq->question . '
                </button>
            </div>
            <div id="collapse' . $faq_count . '" class="collapse' . $firsta . '" aria-labelledby="heading' . $faq_count . '" data-parent="#frequently-asked-questions">
                <div class="card-body">
                    ' . $faq->answer . '
                </div>
            </div>
        </div>
        ';
	} $faqs->close();

	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
	<title>🥇Frequently Asked Questions: {{info:name}}</title>
	<meta name="description" content="{{info:name}} has all your questions answered. {{info:industry}} Questions & Answers - Have more questions? ☎ Call {{info:phone}} today.">

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="place" />
	<meta property="og:site_name" content="{{info:name}}" />
    <meta property="og:title" content="Frequently Asked Questions: {{info:name}}" />
    <meta property="og:description" content="{{info:name}} has all your questions answered. {{info:industry}} Questions & Answers - Have more questions? ☎ Call {{info:phone}} today.">
    <meta property="og:url" content="{{domain}}/{{slug}}" />
    <meta property="og:image" content="{{domain}}/assets/images/pages/faq.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="825" />
    <meta property="og:image:height" content="464" />
    <meta property="og:image:alt" content="Frequently Asked Questions" />

    <meta name="twitter:title" content="Frequently Asked Questions: {{info:name}}">
    <meta name="twitter:description" content="{{info:name}} has all your questions answered. {{info:industry}} Questions & Answers - Have more questions? ☎ Call {{info:phone}} today.">
    <meta name="twitter:image" content="{{domain}}/assets/images/pages/faq.jpg">
    <meta name="twitter:image:alt" content="Frequently Asked Questions">
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
                    "name": "Frequently Asked Questions",
                    "description": "{{info:name}} has all your questions answered. {{info:industry}} Questions & Answers - Have more questions? ☎ Call {{info:phone}} today.",
                    "datePublished": "2019-08-13T20:26:31+00:00",
                    "dateModified": "2019-08-13T20:26:31+00:00",
                    "lastReviewed": "2019-08-13T20:26:31+00:00",
                    "primaryImageOfPage": "{{domain}}/assets/images/pages/faq.jpg",
                    "publisher": {
                        "@type": "{{schemaType}}",
                        "@id": "{{domain}}/#{{schemaType}}",
                        "name": "{{info:name}}",
                        "image": "{{domain}}/assets/images/logo-500x500.png",
                        "telephone": "<?php phonefix($data->b_phone, 'schema'); ?>",
                        "priceRange": "$",
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
                    "isPartOf": {
                        "@type": "WebSite",
                        "@id": "{{domain}}/#WebSite"
                    },
                    "mainEntity": {
                        "@type": "Place",
                        "@id": "{{domain}}/{{slug}}#Place"
                    }
    		    }, {
                    "@type": "FAQPage",
                    "mainEntity": [
                        <?php echo $sfaq; ?>
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
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span>Frequently Asked Questions</span></h1>
	                <p class="ml-3"><span>Have a question about {{info:industry}}? It should be answered here.</span></p>
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
	                <p>Have a question? Take a look at some of the most commonly asked questions our residential and commerical customers ask. Still cannot find the answer to your question? Just ask, our friendly team of highly-trained professionals are always here to help.</p>

    	            <section id="faq">
                	    <div class="container p-0">
                	       <div class="row no-gutters">
                	           <div class="col-12 pb-5 pt-2">
                                    <div class="accordion text-left" id="frequently-asked-questions">
                                        <?php echo $dfaq; ?>
                                    </div>
                	            </div>
                	        </div>
                	    </div>
                	</section>
    	        </div>
        	</div>
	    </div>
	</section>

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>
<?php $process->end(); ?>