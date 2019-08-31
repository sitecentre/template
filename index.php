<?php
	require_once 'inc/includes.php';
	$slug = '';
	
	$socials = $db->query("
    	SELECT
    	so.url
    	FROM rh_socials so
    	WHERE status = '1'
    ");
    $profile = '';
    $profile_count = 0;
    while ($social = $socials->fetch_object()) {
        $profile_count++;
        if($socials->num_rows !== 1 && $socials->num_rows !== $profile_count){ $next = ','; } else { $next = ''; }
		$profile .= '"' . $social->url . '"' . $next . PHP_EOL;
	} $socials->close();
	
	
	$faqs = $db->query("
    	SELECT
    	faq.question
    	, faq.answer
    	FROM rh_faq faq
    	WHERE status = '1'
    ");

    $faq_count = 0;
    while ($faq = $faqs->fetch_object()) {
        $faq_count++;
        if($faq_count == 1) { $first = 'true'; $firsta = ' show'; } else { $first = 'false'; $firsta = ''; }
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

	<title>{{info:name}}:🥇Pest Inspections & Control Professionals</title>
	<meta name="description" content="{{info:description}}">

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>

	<!-- Physical Location -->
    <meta name="geo.region" content="{{info:state}}" />
    <meta name="geo.placename" content="{{info:target:area}}" />
    <meta name="geo.position" content="{{info:lat}};{{info:lon}}" />
    <meta name="ICBM" content="{{info:lat}};{{info:lon}}" />

	<!-- Include Facebook, Twitter, Google Meta Tags - Follow instructions for Business Logo Specs -->
	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="business.business">
	<meta property="og:title" content="{{info:name}}">
	<meta property="og:description" content="{{info:description}}">
	<meta property="og:url" content="{{domain}}/">
	<meta property="og:image" content="{{domain}}/assets/images/logo-500x500.png">

	<meta property="business:contact_data:phone_number" content="<?php phonefix($data->b_phone, 'schema'); ?>">
	<meta property="business:contact_data:website" content="{{domain}}/">
	<meta property="business:contact_data:email" content="{{info:email}}">
	<meta property="business:contact_data:street_address" content="{{info:street}}">
	<meta property="business:contact_data:locality" content="{{info:suburb}}">
	<meta property="business:contact_data:region" content="{{info:state}}">
	<meta property="business:contact_data:postal_code" content="{{info:postcode}}">
	<meta property="business:contact_data:country_name" content="{{info:country}}">

	<meta name="twitter:title" content="{{info:name}}">
    <meta name="twitter:description" content="{{info:description}}">
    <meta name="twitter:image" content="{{domain}}/assets/images/logo-500x500.png">
    <meta name="twitter:image:alt" content="{{info:name}} Logo">
    <meta name="twitter:card" content="summary_large_image">

	<meta property="place:location:latitude" content="{{info:lat}}" />
	<meta property="place:location:longitude" content="{{info:lon}}" />

	<script type="application/ld+json">	
	    {
    		"@context": "https://schema.org",
    		"@graph": [
    		    {
                	"@type": "{{schemaType}}",
                	"url": "{{domain}}/#{{schemaType}}",
                	"name": "{{info:name}}",
                	"description": "{{info:description}}",
                	"areaServed": "{{info:target:area}}",
                	"hasMap": "https://www.google.com/maps?cid={{info:gmb}}",
                    "priceRange": "$",
                	"email": "mailto:{{info:email}}",
                	"telephone": "<?php phonefix($data->b_phone, 'schema'); ?>",
                	"currenciesAccepted": "AUD",
                	"paymentAccepted": ["cash", "credit card", "invoice"],
                	"openingHours": "Mo,Tu,We,Th,Fr 07:00-05:00",
                	"openingHoursSpecification": {
                		"@type": "OpeningHoursSpecification",
                		"dayOfWeek": [
                			"Monday",
                			"Tuesday",
                			"Wednesday",
                			"Thursday",
                			"Friday"
                		],
                		"opens": "07:00",
                		"closes": "17:00"
            	    },
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
            		},
            		"logo": {
                        "@type": "ImageObject",
                        "name": "{{info:name}} Logo",
                        "width": "500",
                        "height": "500",
                        "url": "{{domain}}/assets/images/logo-500x500.png"
                    },
                	"image": [
            			"{{domain}}/assets/images/logo-500x500.png"
            		],
                    "location": [
                        {
                            "@type": "Place",
                            "name": "{{info:target:area}}"
                        }, {
                            "@type": "Place",
                            "geo": {
                                "@type": "GeoCircle",
                                "geoMidpoint": {
                                    "@type": "GeoCoordinates",
                                    "latitude": "{{info:lat}}",
                                    "longitude": "{{info:lon}}"
                                },
                                "geoRadius": "60000"
                            }
                        }
                    ],
                    "contactPoint": { 
                        "@type": "ContactPoint",
                        "telephone": "<?php phonefix($data->b_phone, 'schema'); ?>",
                        "contactType": "sales",
                        "areaServed": "{{info:country:short}}",
                        "availableLanguage": "English"
                    },
                    "sameAs": [
                        <?php echo $profile; ?>
                    ]
            	}, {  
                    "@type": "WebSite",
                    "url": "{{domain}}/#WebSite",
                    "name": "{{info:name}}",
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
                    }
                }, {
                    "@type": "WebPage",
                    "url": "{{domain}}/#WebPage",
                    "inLanguage": "en-AU",
                    "name": "Pest Inspections & Control Experts: {{info:name}}",
                    "datePublished": "2019-01-24T00:30:47+00:00",
                    "dateModified": "2019-05-13T04:54:30+00:00",
                    "description": "{{info:description}}",
                    "isPartOf": {
                        "@type": "WebSite",
                        "@id": "{{domain}}/#WebSite"
                    },
                    "mainEntityOfPage": {
                        "@type": "WebSite",
                        "@id": "{{domain}}/#WebSite"
                    }
                }, {
            	    "@type": "Service",
            	    "url": "{{domain}}/#Service",
            	    "name": "{{info:industry}}",
            	    "description": "{{info:description}}",
            	    "areaServed": "{{info:target:area}}",
            	    "brand": "{{info:name}}",
            	    "category": "{{info:industry}}",
            	    "audience": {
            	        "@type": "Audience",
            	        "audienceType": "{{info:target:demographic}}"
            	    },
            	    "serviceType": [
            	        "Pest Management",
            	        "Pest Control",
            	        "Pest Removal",
            	        "Pest Inspections"
                   ]
    	        }
            ]
    	}
    </script>
</head>
<body>
	<?php $template->menu(); ?>

	<!-- Main website html here -->
	<section id="home-splash" class="d-flex align-items-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-12 py-sm-5 py-3">
	                <h1 class="text-uppercase font-weight-bolder pb-5"><span>{{info:target:area}}<br>{{info:industry}}</span></h1>
	                <h2 class="font-weight-bolder pt-5"><span>from</span>$249</h2>
	            </div>
	        </div>
	    </div>
	</section>

	<section id="request-quote">
	    <div class="container-fluid">
            <div class="row no-gutters d-flex align-items-center">
                <div class="col-5 text-right">
                    <h2 class="quoter">Get a quote over the phone!</h2>
                </div>
                <div class="col-2 my-3">
                    <a href="tel:{{info:phone}}" title="Click to Call" onClick="gtag('event','click',{'name':'Home Page Call','event_category':'Call','event_label':'Splash Circle Call'});"><i class="call-button cta"></i></a>
                </div>
                <div class="col-5 text-left">
                    <h2 class="phone"><a href="tel:{{info:phone}}" title="Click to Call" onClick="gtag('event','click',{'name':'Home Page Call','event_category':'Call','event_label':'Splash Call'});">{{info:phone}}</a></h2>
                </div>
            </div>
	    </div>
	</section>

	<section id="trusted">
	    <div class="container">
	        <div class="row justify-content-between d-flex align-items-center py-4 text-center">
	            <div class="py-2 best">
                    <i class="icon-service"></i> Premium Service
	            </div>
	            <div class="py-2 best">
                    <i class="icon-response"></i> Rapid Response
	            </div>
	            <div class="py-2 best">
                    <i class="icon-locals"></i> Sunshine Coast Locals
	            </div>
	            <div class="py-2 best">
                    <i class="icon-rated"></i> 5 Star Rated
	            </div>
	        </div>
	    </div>
	</section>

	<section id="our-services" class="text-center py-5">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <h2 class="text-uppercase under pb-5">Pests Removed. Properly.</h2>
	                <p>No matter the pest, we have you covered. Fast, Reliable &amp; Affordable Pest Control. Sunshine Coast owned &amp; operated pest control business.</p>
	            </div>
	        </div>

	        <div class="row justify-content-between d-flex align-items-center">
	            <a href="services/spiders" title="Spiders" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-spiders d-flex align-items-center"></i> Spiders
	            </a>
	            <a href="services/ants" title="Ants" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-ants d-flex align-items-center"></i> Ants
	            </a>
	            <a href="services/termite-inspections" title="Termites" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-termites d-flex align-items-center"></i> Termites
	            </a>
	            <a href="services/cockroaches" title="Cockroaches" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-cockroaches d-flex align-items-center"></i> Cockroaches
	            </a>
	            <a href="services/bees-and-wasps" title="Wasps" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-wasps d-flex align-items-center"></i> Wasps
	            </a>
	            <a href="services/bees-and-wasps" title="Bees" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-bees d-flex align-items-center"></i> Bees
	            </a>
	        </div>

	        <div class="row justify-content-between">
	            <a href="services/mosquitoes" title="Mosquito" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-mosqitos d-flex align-items-center"></i> Mosquito
	            </a>
	            <a href="services/rodent-and-mice" title="Rats" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-rats d-flex align-items-center"></i> Rodents & Mice
	            </a>
	            <a href="services/fleas" title="Fleas" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-fleas d-flex align-items-center"></i> Fleas
	            </a>
	            <a href="services/bed-bugs" title="Bedbugs" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-bedbugs d-flex align-items-center"></i> Bedbugs
	            </a>
	            <a href="services" title="All Services" class="service-icon px-3 px-sm-0 py-3">
                    <i class="service-bugs d-flex align-items-center"></i> All Services
	            </a>
	        </div>

	        {{cta:both}}

	    </div>
	</section>

	<section id="why-choose-us">
	    <div class="container text-center py-5">
    	    <div class="row">
    	        <div class="col-12">
    	            <h2 class="text-uppercase under pb-5">Why Choose Us</h2>
    	            <p>We're your local pest controller on the coast, a family owned, and operated business. Handling everything from pest control, termite control, and wasp removal.</p>
    	        </div>
    	    </div>
	    </div>

	    <div class="house">
	        <a class="tooltips tip-one" data-toggle="tooltip" title="Wasp, Bees & Spiders commonly find hard to reach spaces, and inhabit your home. We handle all safe treatments for your home.">+</a>
	        <a class="tooltips tip-two" data-toggle="tooltip" data-placement="right" title="Full home Ant Control, Stop ants entering your home with our Ant Treatments">+</a>
	        <a class="tooltips tip-three" data-toggle="tooltip" title="Full Home Termite Treatments from your front door to your back, we take a whole-home approach to protecting your home.">+</a>
	        <a class="tooltips tip-four" data-toggle="tooltip" title="Flies and Mosquitoes find anyway to get into your home. Let us show you how to handle them.">+</a>
	        <img data-src="{{cdn}}/assets/images/house.jpg" class="img-fluid lazy" title="House Photograph" alt="House Photograph" />
	        
	    </div>
	</section>

	<section id="work-type">
	    <div class="container">
            <div class="row py-5 no-gutters">
                <div class="residential col-md-6 col-sm-12 text-md-right text-center pr-md-5">
                    <h2 class="pb-4 under right black text-uppercase">Residential</h2>
                    <p>For the coast residential customers we will come to your home anywhere on the Sunshine Coast and complete any pest control services on all species of pests. </p>
                    <p>Including but not exclusive to bed bugs, termites, silverfish, ants, fleas, millipedes, spiders, crickets, cockroaches, rodents, and snakes.</p>
                    <p>We offer specialised <b>organic</b> pest control across the coast and all treatments will be under warranty.</p>
                </div>
                <div class="commercial col-md-6 col-sm-12 text-md-left text-center pl-md-5">
                    <h2 class="pb-4 under left white text-uppercase">Commercial</h2>
                    <p>Our ever growing base of commercial customers we provide a wide-range of pest control services throughout the Sunshine Coast. Businesses have found us to be reliable, efficient and competitive on price.</p>
                    <p>If you are on the coast, our commercial grade pest management solutions can assist providing food-safe solutions, organic and safe solutions.</p>
                    <p>We only use quality, long-life products with full warranty.</p>
                </div>
            </div>
            <div class="text-center pb-5">
                <button type="button" class="btn cta pulse" data-toggle="modal" data-target="#book-online" onClick="gtag('event','click',{'name':'Res - Com Book','event_category':'Book','event_label':'Res - Com Book'});">Book Online</button>
            </div>
	    </div>
	</section>

	<section id="services">
	    <div class="container py-5">
	        <div class="row justify-content-md-center">
	            <div class="col-xl-10 col-sm-12 text-center">
    	            <h2 class="under pb-4 text-uppercase">Our Services</h2>
    	            <p class="pb-4">Home to over 300,000 residence the Sunshine Coast continues to grow with new developments like Aura, it's important Sunshine Coast Pest Control services the entire coast with all your management, and inspection needs.</p>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/termite-inspections.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/termite-inspections.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/termite-inspections.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/termite-inspections.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/termite-inspections.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/termite-inspections.jpg 510w" title="Termite Inspection Image" alt="Termite Inspection Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Termite Inspection</h3>
	                        <a href="services/termite-inspections" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/ants.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/ants.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/ants.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/ants.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/ants.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/ants.jpg 510w" title="Ant Control Image" alt="Ant Control Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Ant Control</h3>
	                        <a href="services/ants" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/fleas.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/fleas.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/fleas.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/fleas.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/fleas.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/fleas.jpg 510w" title="Flea Treatments Image" alt="Flea Treatments Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Flea Control</h3>
	                        <a href="services/" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/bees-and-wasps.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/bees-and-wasps.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/bees-and-wasps.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/bees-and-wasps.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/bees-and-wasps.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/bees-and-wasps.jpg 510w" title="Bee & Wasp Image" alt="Bee & Wasp Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Bees &amp; Wasps</h3>
	                        <a href="services/bees-and-wasps" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/flies.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/flies.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/flies.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/flies.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/flies.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/flies.jpg 510w" title="Fly Pest Control Image" alt="Fly Pest Control Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Fly Pest Control</h3>
	                        <a href="services/flies" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/spiders.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/spiders.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/spiders.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/spiders.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/spiders.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/spiders.jpg 510w" title="Spider Control Image" alt="Spider Control Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Spider Control</h3>
	                        <a href="services/spiders" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/cockroaches.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/cockroaches.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/cockroaches.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/cockroaches.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/cockroaches.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/cockroaches.jpg 510w" title="Cockroach Pest Control Image" alt="Cockroach Pest Control Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Cockroach Pest Control</h3>
	                        <a href="services/cockroaches" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/bed-bugs.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/bed-bugs.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/bed-bugs.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/bed-bugs.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/bed-bugs.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/bed-bugs.jpg 510w" title="Bed Bug Treatments Image" alt="Bed Bug Treatments Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Bed Bug Treatments</h3>
	                        <a href="services/bed-bugs" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/mosquitoes.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/mosquitoes.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/mosquitoes.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/mosquitoes.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/mosquitoes.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/mosquitoes.jpg 510w" title="Mosquito Treatment Image" alt="Mosquito Treatment Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Mosquito Treatment</h3>
	                        <a href="services/mosquitoes" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/silverfish.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/silverfish.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/silverfish.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/silverfish.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/silverfish.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/silverfish.jpg 510w" title="Silverfish Treatment Image" alt="Silverfish Treatment Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Silverfish Treatment</h3>
	                        <a href="services/silverfish" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/rodent-and-mice.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/rodent-and-mice.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/rodent-and-mice.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/rodent-and-mice.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/rodent-and-mice.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/rodent-and-mice.jpg 510w" title="Rodent & Mice Removal Image" alt="Rodent & Mice Removal Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Rodent &amp; Mice Removal</h3>
	                        <a href="services/rodent-and-mice" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-sm-6 col-xs-12 py-3">
	                <div class="post">
	                    <img data-src="{{cdn}}/assets/images/services/snakes.jpg" data-srcset="{{cdn}}/tr:w-240,pr-true/assets/images/services/snakes.jpg 240w, {{cdn}}/tr:w-290,pr-true/assets/images/services/snakes.jpg 290w, {{cdn}}/tr:w-330,pr-true/assets/images/services/snakes.jpg 330w, {{cdn}}/tr:w-350,pr-true/assets/images/services/snakes.jpg 350w, {{cdn}}/tr:w-510,pr-true/assets/images/services/snakes.jpg 510w" title="Snake Removal Image" alt="Snake Removal Image" class="lazy img-fluid" />
	                    <div class="p-3 text-center">
	                        <h3>Snake Removal</h3>
	                        <a href="services/snakes" class="btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	        </div>

	        {{cta:both}}
	    </div>
	</section>

	<section id="faq">
	    <div class="container">
	        <div class="row justify-content-md-center">
	            <div class="col-12 col-md-10 pt-5 text-center">
	                <h2 class="under pb-4 text-uppercase">Frequesntly Asked Questions</h2>
	                <p>Have a question? Take a look at some of the most commonly asked questions our residential and commerical customers ask. Still cannot find the answer to your question? Just ask, our friendly team of highly-trained professionals are always here to help.</p>
	           </div>
	       </div>
	       <div class="row">
	           <div class="col-12 pb-5 pt-2">
                    <div class="accordion text-left" id="frequently-asked-questions">
                        <?php echo $dfaq; ?>
                    </div>
	            </div>
	        </div>
	    </div>
	</section>

    <?php $template->footer(); ?>
    <script src="{{cdn}}/assets/js/popper-1.12.9.min.js"></script>
	<?php $template->javascript(); ?>
	<script defer async>$(function(){$('[data-toggle="tooltip"]').tooltip()})</script>
</body>
</html>
<?php $process->end(); ?>