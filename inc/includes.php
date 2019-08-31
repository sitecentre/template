<?php
    /*
        INCLUDES FILE
        @Author: Brodey Sheppard

        *-/-\-/-/-\-/-/-\-/-/-\-/-*
                DO NOT EDIT
        *-/-\-/-/-\-/-/-\-/-/-\-/-*
        
        Version: 1.1
    */
    
    // Set Security Headers
    header("X-XSS-Protection: 1; mode=block");
    header('X-Frame-Options: SAMEORIGIN');
    header('Content-Type: text/html; charset=UTF-8');
    header('X-Frame-Options: DENY');
    
    // Setting Empty Variables.
    $db = $core = $domain = $cdn = $slug = $page = $suburb = $service = $b_schemaType = $process = $content = $b_name = $review_rated = $review_total = $primary_colour = $b_country_short = $bsc = $ga = $gsc = $b_state = $b_country = $b_industry = $b_target_area = $b_description = $b_phone = $b_email = $b_street = $b_postcode = $b_suburb = $b_lat = $b_lon = $b_abn = $b_started = $b_GMB_cid = $b_title_name = '';

    // Include required files
    require_once 'conn.php';

    $core = $db->query("
    	SELECT
    	s.b_name
    	, s.b_title_name
    	, s.primary_colour
    	, s.secondary_colour
    	, s.domain
    	, s.cdn
    	, s.b_country
    	, s.b_country_short
    	, s.b_state
    	, s.b_description
    	, s.b_phone
    	, s.b_email
    	, s.b_street
    	, s.b_suburb
    	, s.b_postcode
    	, s.b_lat
    	, s.b_lon
    	, s.b_abn
    	, s.b_started
    	, s.b_GMB_cid
    	, s.b_industry
    	, s.b_schemaType
    	, s.b_target_area
    	, s.b_target_demographic
    	, s.gsc
    	, s.bsc
    	, s.ga
    	, s.review_rated
    	, s.review_total
    	, s.status
    	, s.development_mode
    	FROM rh_settings s
    	WHERE status = '1'
    	LIMIT 1
    ");
    $data = $core->fetch_object();

    require_once 'functions.php';
    require_once 'optimisations.php';

    // Don't Change These Settings
    $slug = ltrim($_SERVER['REQUEST_URI'], '/');

    if($data->development_mode == '1'){
        $cdn = $data->domain;

        require "lessphp/lessc.inc.php";

        $inputFile = "assets/css/master.less";
        $outputFile = "assets/css/main.css";

        $less = new lessc;
        $less->setFormatter("compressed");

        // create a new cache object, and compile
        $cache = $less->cachedCompile($inputFile);

        file_put_contents($outputFile, $cache["compiled"]);

        $less->setFormatter("compressed");

        $cssFiles = array('assets/css/bootstrap-custom.css', $outputFile);
        function minifyCss($css) {
            global $data;
            $css = str_replace('{{domain}}', $data->cdn, $css);
            $css = str_replace('\'{{secondary_colour}}\'', $data->secondary_colour, $css);
            $css = str_replace('\'{{primary_colour}}\'', $data->primary_colour, $css);
            $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
            preg_match_all('/(\'[^\']*?\'|"[^"]*?")/ims', $css, $hit, PREG_PATTERN_ORDER);
            for ($i=0; $i < count($hit[1]); $i++) {
                $css = str_replace($hit[1][$i], '##########' . $i . '##########', $css);
            }
            $css = preg_replace('/;[\s\r\n\t]*?}[\s\r\n\t]*/ims', "}\r\n", $css);
            $css = preg_replace('/;[\s\r\n\t]*?([\r\n]?[^\s\r\n\t])/ims', ';$1', $css);
            $css = preg_replace('/[\s\r\n\t]*:[\s\r\n\t]*?([^\s\r\n\t])/ims', ':$1', $css);
            $css = preg_replace('/[\s\r\n\t]*,[\s\r\n\t]*?([^\s\r\n\t])/ims', ',$1', $css);
            $css = preg_replace('/[\s\r\n\t]*{[\s\r\n\t]*?([^\s\r\n\t])/ims', '{$1', $css);
            $css = preg_replace('/([\d\.]+)[\s\r\n\t]+(px|em|pt|%)/ims', '$1$2', $css);
            $css = preg_replace('/([^\d\.]0)(px|em|pt|%)/ims', '$1', $css);
            $css = preg_replace('/\p{Zs}+/ims',' ', $css);
            $css = str_replace(array("\r\n", "\r", "\n"), '', $css);
            for ($i=0; $i < count($hit[1]); $i++) {
                $css = str_replace('##########' . $i . '##########', $hit[1][$i], $css);
            }
            $css = str_replace(' !important', '!important', $css);
            return $css;
        }

        $cssContents = '';
        foreach($cssFiles as $file) {
            $cssContents .= file_get_contents($file);
        }

        file_put_contents($outputFile, minifyCss($cssContents));

        // the next time we run, write only if it has updated
        $last_updated = $cache["updated"];
        $cache = $less->cachedCompile($cache);
        if ($cache["updated"] > $last_updated){
            file_put_contents($outputFile, $cache["compiled"]);
        }
    } else {
        $cdn = $data->cdn;
        require_once 'http-push.php';
    }

    class template {
    	public function meta(){
    		require_once 'template/meta.php';
    	}

    	public function menu(){
    		require_once 'template/header.php';
    	}

    	public function footer(){
    		require_once 'template/footer.php';
    	}

    	public function javascript() {
        	require_once 'template/javascript.php';
    	}
    }
    $template = new template();
?>