<!-- Setup Business Schema Based on Business Type -->
<script type="application/ld+json">
	{
		"@context":"http://schema.org",
		"@graph": [
		    {
		        "@type":"Organization",
        		"@id":"https://www.sitecentre.com.au/",
        		"name":"sitecentre",
        		"description": "",
        		"url": "https://www.sitecentre.com.au/",
        		"logo": {
                    "@type": "ImageObject",
                    "name": "sitecentre",
                    "width": "500",
                    "height": "500",
                    "url": "https://www.sitecentre.com.au/assets/images/sitecentre-corporate-logo-square.png"
                },
        		"areaServed": "Australia",
        		"email": "hello@sitecentre.com.au",
        		"telephone":"+61 1300 755 306",
        		"image": [
        			"https://www.sitecentre.com.au/assets/images/sitecentre-corporate-logo-square.png"
        		],
        		"mainEntityOfPage": {
        		    "@type": "WebPage",
        		    "@id": "https://www.sitecentre.com.au<?php echo $slug; ?>"
        		},
                "sameAs": [
                    "https://www.facebook.com/sitecentre/",
                    "https://www.linkedin.com/company/sitecentre/"
                ],
                "contactPoint": [
                    { "@type": "ContactPoint",
                        "telephone": "+61 1300 755 306",
                        "contactType": "customer support",
                        "areaServed": "AU",
                        "availableLanguage": "English"
                    },
                    { "@type": "ContactPoint",
                        "telephone": "+61 1300 755 306",
                        "contactType": "sales",
                        "areaServed": "AU",
                        "availableLanguage": "English"
                    }
                ]
		    },
		    {
            	"@context": "http://schema.org",
            	"@type": "LocalBusiness",
            	"@id":"https://www.sitecentre.com.au/",
            	"name": "sitecentre",
            	"legalName": "Staple Affiliates PTY LTD",
            	"hasMap": "https://www.google.com/maps?cid=15263416407537591983",
            	"address":{
        			"@type":"PostalAddress",
        			"streetAddress":"PO Box 290",
        			"addressLocality":"Caloundra",
        			"addressRegion":"QLD",
        			"postalCode":"4551",
        			"addressCountry":"Australia"
        		},
                "priceRange":"$",
            	"image": "https://www.sitecentre.com.au/assets/images/sitecentre-corporate-logo-square.png",
            	"email": "hello@sitecentre.com.au",
            	"telePhone": "+61 1300 755 306",
            	"url": "https://www.sitecentre.com.au",
            	"currenciesAccepted": "AUD",
            	"paymentAccepted": [
            	    "cash",
            	    "check",
            	    "credit card",
            	    "invoice",
            	    "paypal"
            	],
            	"openingHours": "Mo,Tu,We,Th,Fr,Sa,Su 07:00-05:00",
            	"openingHoursSpecification": [
            	    {
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
            	    }
            	],
                "location": {
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
                },
                "memberOf": {
                    "name":"Australian Business Register",
                    "url": "https://abr.business.gov.au/ABN/View/37616060827"
                }
        	}, {
                "@type":"WebSite",
                "@id":"https://www.sitecentre.com.au/#WebSite",
                "url":"https://www.sitecentre.com.au/",
                "name":"sitecentre",
                "publisher":{  
                    "@id":"https://www.sitecentre.com.au/#Organization"
                }
        	}, {
                "@type":"WebPage",
                "@id":"https://www.sitecentre.com.au/#WebPage",
                "url":"https://www.sitecentre.com.au/",
                "inLanguage":"en-AU",
                "name":"Digital Business Development Experts (Australia): sitecentre",
                "isPartOf":{  
                    "@id":"https://www.sitecentre.com.au/#WebSite"
                },
                "datePublished":"2019-01-24T00:30:47+00:00",
                "dateModified":"2019-05-13T04:54:30+00:00",
                "description":"If you're looking for digital marketing for your brand, or business. sitecentre Australia has everything you'll need. Hosting, SEO, Domains, Graphic Design, Web Design and PPC."
            }
		]
	}
</script>