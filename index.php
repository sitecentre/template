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
    		"@context": "https://schema.org",
    		"@graph": [
    		    {
                	"@type": "LocalBusiness",
                	"url": "<?php echo $domain . '/#LocalBusiness'; ?>",
                	"name": "sitecentre",
                	"legalName": "Staple Affiliates PTY LTD",
                	"areaServed": "Australia",
                	"hasMap": "https://www.google.com/maps?cid=15263416407537591983",
                    "priceRange": "$",
                	"email": "mailto:hello@sitecentre.com.au",
                	"telephone": "+61-1300-755-306",
                	"currenciesAccepted": "AUD",
                	"paymentAccepted": ["cash", "check", "credit card", "invoice", "paypal"],
                	"openingHours": "Mo,Tu,We,Th,Fr,Sa,Su 07:00-05:00",
                	"openingHoursSpecification": {
                		"@type": "OpeningHoursSpecification",
                		"dayOfWeek": [
                			"Monday",
                			"Tuesday",
                			"Wednesday",
                			"Thursday",
                			"Friday",
                			"Saturday",
                			"Sunday"
                		],
                		"opens": "07:00",
                		"closes": "17:00"
            	    },
                	"address": {
            			"@type": "PostalAddress",
            			"streetAddress": "PO Box 290",
            			"addressLocality": "Caloundra",
            			"addressRegion": "QLD",
            			"postalCode": "4551",
            			"addressCountry": "Australia"
            		},
            		"logo": {
                        "@type": "ImageObject",
                        "name": "sitecentre",
                        "width": "500",
                        "height": "500",
                        "url": "<?php echo $domain . '/assets/images/sitecentre-corporate-logo-square.png'; ?>"
                    },
                	"image": [
            			"<?php echo $domain . '/assets/images/sitecentre-corporate-logo-square.png'; ?>"
            		],
                    "location": [
                        {
                            "@type": "Place",
                            "name": "Australia"
                        }, {
                            "@type": "Place",
                            "geo": {
                                "@type": "GeoCircle",
                                "geoMidpoint": {
                                    "@type": "GeoCoordinates",
                                    "latitude": "-26.798163",
                                    "longitude": "153.135443"
                                },
                                "geoRadius": "60000"
                            }
                        }
                    ],
                    "contactPoint": [
                        { 
                            "@type": "ContactPoint",
                            "telephone": "+61-1300-755-306",
                            "contactType": "customer support",
                            "areaServed": "AU",
                            "availableLanguage": "English"
                        }, { 
                            "@type": "ContactPoint",
                            "telephone": "+61-1300-755-306",
                            "contactType": "sales",
                            "areaServed": "AU",
                            "availableLanguage": "English"
                        }
                    ],
                    "sameAs": [
                        "https://www.facebook.com/sitecentre/",
                        "https://www.linkedin.com/company/sitecentre/"
                    ],
                    "memberOf": {
                        "name": "Australian Business Register",
                        "url": "https://abr.business.gov.au/ABN/View/37616060827"
                    }
            	}, {  
                    "@type": "WebSite",
                    "url": "<?php echo $domain . '/#WebSite'; ?>",
                    "name": "sitecentre",
                    "publisher": {
                        "@type": "LocalBusiness",
                        "@id": "<?php echo $domain . '/#LocalBusiness'; ?>",
                        "name": "sitecentre",
                        "image": "<?php echo $domain . '/assets/images/sitecentre-corporate-logo-square.png'; ?>",
                        "telephone": "+61-1300-755-306",
                        "priceRange": "$",
                        "address": {
                			"@type": "PostalAddress",
                			"streetAddress": "PO Box 290",
                			"addressLocality": "Caloundra",
                			"addressRegion": "QLD",
                			"postalCode": "4551",
                			"addressCountry": {
                			    "@type": "Country",
                			    "name": "Australia"
                			}
                		}
                    }
                }, {
                    "@type": "WebPage",
                    "url": "<?php echo $domain . '/#WebPage'; ?>",
                    "inLanguage": "en-AU",
                    "name": "Digital Business Development Experts (Australia): sitecentre",
                    "isPartOf": {
                        "@type": "WebSite",
                        "@id": "<?php echo $domain . '/#WebSite'; ?>"
                    },
                    "datePublished": "2019-01-24T00:30:47+00:00",
                    "dateModified": "2019-05-13T04:54:30+00:00",
                    "description": "If you're looking for digital marketing for your brand, or business. sitecentre Australia has everything you'll need. Hosting, SEO, Domains, Graphic Design, Web Design and PPC."
                }, {  
                    "@type":"SiteNavigationElement",
                    "name": [
                        "Home",
                        "Hosting",
                        "Domains",
                        "SEO",
                        "PPC",
                        "Design",
                        "Blog"
                    ],
                    "url": [
                        "https://www.sitecentre.com.au/",
                        "https://www.sitecentre.com.au/hosting",
                        "https://www.sitecentre.com.au/domains",
                        "https://www.sitecentre.com.au/seo",
                        "https://www.sitecentre.com.au/ppc",
                        "https://www.sitecentre.com.au/design",
                        "https://www.sitecentre.com.au/blog"
                    ]
                }, {
            	    "@type": "Service",
            	    "url": "<?php echo $domain . '/#Service'; ?>",
            	    "name": "Sunshine Coast Digital Marketing Agency",
            	    "areaServed": "Sunshine Coast, Brisbane, Melbourne, Hawthorn, Australia",
            	    "audience": {
            	        "@type": "Audience",
            	        "audienceType": "Business Owners"
            	    },
            	    "brand": "sitecentre",
            	    "category": "Marketing",
            	    "serviceOutput": "Digital Marketing",
            	    "serviceType": [
            	        "Digital Marketing",
            	        "Local SEO",
            	        "PPC Management",
            	        "Web Hosting",
            	        "Website Design",
            	        "Domain Management",
            	        "SSL Certificates",
            	        "Social Media Marketing"
                   ],
                   "alternateName": "sitecentre",
                   "description": "If you're looking for digital marketing for your brand, or business. sitecentre Australia has everything you'll need. Hosting, SEO, Domains, Graphic Design, Web Design and PPC.",
                   "mainEntityOfPage": {
                        "@type": "WebPage",
                        "@id": "<?php echo $domain . '/#WebPage'; ?>"
                   }
    	        }
            ]
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
