<?php
    /*
        FUNCTIONS FILE
        @Author: Brodey Sheppard

        *-/-\-/-/-\-/-/-\-/-/-\-/-*
                DO NOT EDIT
        *-/-\-/-/-\-/-/-\-/-/-\-/-*
    */

    // Process Phone number types
    function phonefix($number, $type){
        global $data;
        $number = str_replace(' ', '', $number);
        $number = str_replace('-', '', $number);
        $number = str_replace('+61', '', $number);
        $number = str_replace('(', '', $number);
        $number = str_replace(')', '', $number);

        if($type == 'pretty'){
            $number = substr($number, 0, 4) . ' ' . substr($number, 4, 3) . ' ' . substr($number, 7, 3);
        } elseif ($type == 'schema'){
            $number = '+61-' . substr($number, 0, 4) . '-' . substr($number, 4, 3) . '-' . substr($number, 7, 3);
        } elseif ($type == 'international') {
            $number = '+61 ' . substr($number, 0, 4) . ' ' . substr($number, 4, 3) . ' ' . substr($number, 7, 3);
        }

        // Echo the Number
        echo $number;
    }

    // This Function is used in the thank you form to remove unsafe data.
    function _validation($variable) {
        $variable = strip_tags($variable);
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);
        return $variable;
    }

    // Used within the thank you form page to validate noone has tried to adjust headers or data.
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
?>