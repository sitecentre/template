<?php
    /*
        OPTIMISATIONS FILE
        @Author: Brodey Sheppard

        *-/-\-/-/-\-/-/-\-/-/-\-/-*
                DO NOT EDIT
        *-/-\-/-/-\-/-/-\-/-/-\-/-*
    */

    // Process the template
    function optimise($content){
        global $data;
        global $cdn;
        global $slug;
        global $suburb;
        global $service;
        global $page;

        $optimise = $content;

        // Map Replacement with responsive map for suburbs.
        $optimise = str_replace('{{suburb:map}}', '
    	<div class="my-4 embed-responsive embed-responsive-16by9">
            <iframe sandbox="allow-same-origin allow-scripts" class="lazy" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" data-src="https://maps.google.com/maps?q=' . $suburb->suburb_name .'%2C%20' . $suburb->state . '&amp;t=m&amp;z=13&amp;output=embed&amp;iwloc=near" title="Map of ' . $suburb->suburb_name . ', ' . $suburb->state . ' ' . $suburb->suburb_postcode . '" aria-label="' . $suburb->suburb_name . ', ' . $suburb->state . ' ' . $suburb->suburb_postcode . '"></iframe>
        </div>
    	', $optimise);

    	// {{suburb:photo}} - Display Photo on page
    	$optimise = str_replace('{{suburb:photo}}', '<img data-src="{{cdn}}/assets/images/' . $suburb->slug . '.jpg" data-srcset="{{cdn}}/tr:w-450,pr-true/assets/images/' . $suburb->slug . '.jpg 450w, {{cdn}}/tr:w-455,pr-true/assets/images/' . $suburb->slug . '.jpg 455w, {{cdn}}/tr:w-510,pr-true/assets/images/' . $suburb->slug . '.jpg 510w, {{cdn}}/tr:w-690,pr-true/assets/images/' . $suburb->slug . '.jpg 690w, {{cdn}}/tr:w-825,pr-true/assets/images/' . $suburb->slug . '.jpg 825w" title="Photo of {{info:name}} in ' . $suburb->suburb_name . ', ' . $suburb->state . ' ' . $suburb->suburb_postcode . '" alt="Image of ' . $suburb->suburb_name . '" class="lazy img-fluid" />', $optimise);

        // {{service:photo}} - Display Photo on page
    	$optimise = str_replace('{{service:photo}}', '<img data-src="{{cdn}}/assets/images/' . $service->slug . '.jpg" data-srcset="{{cdn}}/tr:w-450,pr-true/assets/images/' . $service->slug . '.jpg 450w, {{cdn}}/tr:w-455,pr-true/assets/images/' . $service->slug . '.jpg 455w, {{cdn}}/tr:w-510,pr-true/assets/images/' . $service->slug . '.jpg 510w, {{cdn}}/tr:w-690,pr-true/assets/images/' . $service->slug . '.jpg 690w, {{cdn}}/tr:w-825,pr-true/assets/images/' . $service->slug . '.jpg 825w" title="Photo of {{info:name}} doing ' . $service->name . '" alt="' . $service->name . ' {{info:target:area}}" class="lazy img-fluid" />', $optimise);

        // {{page:photo}} - Display Photo on page
    	$optimise = str_replace('{{page:photo}}', '<img data-src="{{cdn}}/assets/images/pages/' . $page->slug . '.jpg" data-srcset="{{cdn}}/tr:w-450,pr-true/assets/images/pages/' . $page->slug . '.jpg 450w, {{cdn}}/tr:w-455,pr-true/assets/images/pages/' . $page->slug . '.jpg 455w, {{cdn}}/tr:w-510,pr-true/assets/images/pages/' . $page->slug . '.jpg 510w, {{cdn}}/tr:w-690,pr-true/assets/images/pages/' . $page->slug . '.jpg 690w, {{cdn}}/tr:w-825,pr-true/assets/images/pages/' . $page->slug . '.jpg 825w" title="Photo of {{info:name}} doing ' . $page->title . '" alt="' . $page->title . ' {{info:target:area}}" class="lazy img-fluid" />', $optimise);

        // {{cta:both}} - Call to action both book & phone
    	$optimise = str_replace('{{cta:both}}', '
    	    <div class="btn-phone m-3 text-center">
	            <button type="button" class="btn yellow cta pulse" data-toggle="modal" data-target="#book-online" onClick="gtag(\'event\',\'click\',{\'name\':\'Page CTA Book\',\'event_category\':\'Book\',\'event_label\':\'Page CTA Book\'});">Book Online</button>
	            <i class="phone-icon"></i> <a href="tel:{{info:phone}}" class="red-number" onClick="gtag(\'event\',\'click\',{\'name\':\'Page CTA Call\',\'event_category\':\'Call\',\'event_label\':\'Page CTA Call\'});" title="Call ' . $data->b_name . '">{{info:phone}}</a>
	        </div>
    	', $optimise);

    	// {{cta:book}} - Call to action book button
    	$optimise = str_replace('{{cta:book}}', '
    	    <div class="btn-phone m-3 text-center">
	            <button type="button" class="btn yellow cta pulse" data-toggle="modal" data-target="#book-online" onClick="gtag(\'event\',\'click\',{\'name\':\'Page CTA Book\',\'event_category\':\'Book\',\'event_label\':\'Page CTA Book\'});">Book Online</button>
	        </div>
    	', $optimise);

    	// {{cta:phone}} - Call to action phone number
    	$optimise = str_replace('{{cta:phone}}', '
    	    <div class="btn-phone m-3 text-center">
	            <i class="phone-icon"></i> <a href="tel:{{info:phone}}" class="red-number" onClick="gtag(\'event\',\'click\',{\'name\':\'Page CTA Call\',\'event_category\':\'Call\',\'event_label\':\'Page CTA Call\'});" title="Call ' . $data->b_name . '">{{info:phone}}</a>
	        </div>
    	', $optimise);

    	// Inserts business information like phone, email, address, business name and so forth. usage: {{info:phone}} or {{info:email}}
    	$optimise = str_replace('{{domain}}', $data->domain, $optimise);
    	$optimise = str_replace('{{slug}}', $slug, $optimise);
    	$optimise = str_replace('{{cdn}}', $cdn, $optimise);
    	$optimise = str_replace('{{schemaType}}', $data->b_schemaType, $optimise);
    	
    	$optimise = str_replace('{{info:gmb}}', $data->b_GMB_cid, $optimise);
    	$optimise = str_replace('{{info:gsc}}', $data->gsc, $optimise);
    	$optimise = str_replace('{{info:bsc}}', $data->bsc, $optimise);
    	$optimise = str_replace('{{info:ga}}', $data->ga, $optimise);

        $optimise = str_replace('{{info:primary_colour}}', $data->primary_colour, $optimise);
        $optimise = str_replace('{{info:secondary_colour}}', $data->secondary_colour, $optimise);
    	$optimise = str_replace('{{info:name}}', $data->b_name, $optimise);
    	$optimise = str_replace('{{info:name:short}}', $data->b_title_name, $optimise);
    	$optimise = str_replace('{{info:description}}', $data->b_description, $optimise);
    	$optimise = str_replace('{{info:phone}}', $data->b_phone, $optimise);
    	$optimise = str_replace('{{info:abn}}', $data->b_abn, $optimise);
    	$optimise = str_replace('{{info:email}}', $data->b_email, $optimise);
    	$optimise = str_replace('{{info:industry}}', $data->b_industry, $optimise);
    	$optimise = str_replace('{{info:target:area}}', $data->b_target_area, $optimise);
    	$optimise = str_replace('{{info:target:demographic}}', $data->b_target_demographic, $optimise);
    	$optimise = str_replace('{{info:started}}', $data->b_started, $optimise);
    	$optimise = str_replace('{{info:years}}', round(date("Y") - $data->b_started), $optimise);
    	$optimise = str_replace('{{info:street}}', $data->b_street, $optimise);
    	$optimise = str_replace('{{info:postcode}}', $data->b_postcode, $optimise);
    	$optimise = str_replace('{{info:suburb}}', $data->b_suburb, $optimise);
    	$optimise = str_replace('{{info:state}}', $data->b_state, $optimise);
    	$optimise = str_replace('{{info:country}}', $data->b_country, $optimise);
    	$optimise = str_replace('{{info:country:short}}', $data->b_country_short, $optimise);
    	
    	$optimise = str_replace('{{info:lat}}', $data->b_lat, $optimise);
    	$optimise = str_replace('{{info:lon}}', $data->b_lon, $optimise);

    	$optimise = str_replace('{{review_total}}', $data->review_total, $optimise);
    	$optimise = str_replace('{{review_rated}}', $data->review_rated, $optimise);

        if($data->development_mode !== '1'){
            $optimise = preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'', $optimise));
            $optimise = preg_replace('/\s+/', ' ', $optimise);
            $optimise = str_replace('> <', '><', $optimise);
            $optimise = str_replace('": "', '":"', $optimise);
            $optimise = str_replace('", "', '","', $optimise);
            $optimise = str_replace('": { "', '":{"', $optimise);
            $optimise = str_replace('} }', '}}', $optimise);
            $optimise = str_replace(', "', ',"', $optimise);
            $optimise = str_replace('": { "', '":{"', $optimise);
            $optimise = str_replace('": [ { "', '":[{"', $optimise);
            $optimise = str_replace(', { "', ',{"', $optimise);
            $optimise = str_replace('> { "', '>{"', $optimise);
            $optimise = str_replace(' } ] } ', '}]}', $optimise);
        }

        return $optimise;
    }

    class process {
        function start(){
            ob_start(); // Records content
        }

        function end(){
            $content = ob_get_clean(); // Gathers the content
            $content = optimise($content); // Run Optimisations, Replacements and Processes

            echo $content; // Output the Content
            ob_end_flush();
        }
    }
    $process = new process();
?>