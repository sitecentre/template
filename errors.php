<?php
	require_once 'inc/includes.php';
	$slug = '';
	$process->start();

    if($status == '404'){ } else {
	    $status = $_SERVER['SERVER_PROTOCOL'];
    }

    $codes = array(
        400 => array('400', '400 Bad Request', 'The request cannot be fulfilled due to bad syntax.'),
        401 => array('401', '401 Login Error', 'It appears that the password and/or user-name you entered was incorrect.'),
        403 => array('403', '403 Forbidden', 'Sorry, employees and staff only.'),
        404 => array('404', '404 Page Not Found', 'We\'re sorry, but the page you\'re looking for is missing, hiding, or maybe it moved somewhere else and forgot to tell you.'),
        405 => array('405', '405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
        408 => array('408', '408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
        414 => array('414', '414 URL To Long', 'The URL you entered is longer than the maximum length.'),
        500 => array('500', '500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
        502 => array('502', '502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
        504 => array('504', '504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
    );

    $errortitle = $codes[$status][1];
    $message = $codes[$status][2];

    http_response_code($codes[$status][0]);

    if($errortitle == false){
        $errortitle = "Unknown Error";
        $message = "An unknown error has occurred.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title><?php echo $errortitle . ': {{info:name}}'; ?></title>
	<meta name="description" content="">
	<meta name="robots" content="noindex" />

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>
	
	<style>
    @import "https://fonts.googleapis.com/css?family=Dosis:300,400,700,800";.particle-error,.permission_denied,#particles-js{width:100%;height:100%;margin:0!important}#particles-js{position:fixed!important;opacity:.23}.permission_denied{background:#24344c!important}.permission_denied a{text-decoration:none}.denied__wrapper{max-width:390px;width:100%;height:390px;display:block;margin:0 auto;position:relative;margin-top:8vh}.permission_denied h1{text-align:center;color:#fff;margin-bottom:0;font:800 100px "Dosis",sans-serif}.permission_denied h3{text-align:center;color:#fff;max-width:500px;margin:0 auto 30px;font:400 19px/23px "Dosis",sans-serif}.permission_denied h3 span{position:relative;width:65px;display:inline-block}.permission_denied h3 span:after{content:"";border-bottom:3px solid #ffbb39;position:absolute;left:0;top:43%;width:100%}.denied__link{background:none;color:#fff;padding:12px 0 10px;border:1px solid #fff;outline:none;border-radius:7px;width:150px;text-align:center;margin:0 auto;vertical-align:middle;display:block;margin-bottom:40px;margin-top:25px;font:400 15px "Dosis",sans-serif}.denied__link:hover{color:#ffbb39;border-color:#ffbb39;cursor:pointer;opacity:1}.permission_denied .stars{animation:sparkle 1.6s infinite ease-in-out alternate}@keyframes sparkle{0%{opacity:1}100%{opacity:.3}}#astronaut{width:43px;position:absolute;right:20px;top:210px;animation:spin 4.5s infinite linear}@keyframes spin{0%{transform:rotateZ(0deg)}100%{transform:rotateZ(360deg)}}@media (max-width: 600px){.permission_denied h1{font-size:75px}.permission_denied h3{font-size:16px;width:200px;margin:0 auto;line-height:23px}.permission_denied h3 span{width:60px}#astronaut{width:35px;right:40px;top:170px}}.saturn,.saturn-2,.hover{animation:hover 2s infinite ease-in-out alternate}@keyframes hover{0%{transform:translateY(3px)}100%{transform:translateY(-3px)}
    </style>
</head>
<body class="permission_denied">
                            
    <div id="particles-js"></div>
  <div class="denied__wrapper">
    <?php 
        echo('<h1>' . $errortitle . '</h1>');
        echo('<h3>' . $message . '</h3>');
    ?>
    <svg id="astronaut" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <style>
      .st0{fill:none;} .st1{fill:#504E55;} .st2{fill:#F39E72;} .st3{fill:#FFFFFF;} .st4{opacity:0.24;} .st5{fill:#77574E;} .st6{fill:#FBD68D;} .st7{fill:#ECECEC;} .st8{fill:#F4A89C;} .st9{fill:#CFC9E5;} .st10{opacity:0.28;} .st11{opacity:0.25;} .st12{fill:#6F635C;} .st13{fill:#DAE7BE;} .st14{fill:#FFE0A6;} .st15{fill:#5F5E60;} .st16{fill:#CFE1AF;} .st17{fill:#EBE9F5;} .st18{fill:#53515A;} .st19{opacity:0.42;} .st20{fill:#53515B;}
    </style>
    <circle cx="256.8" cy="255.3" r="247.9" class="st0"/>
    <path d="M346.4 475H164.9V244.8c0-14 11.4-25.4 25.4-25.4H321c14 0 25.4 11.4 25.4 25.4V475z" class="st2"/>
    <path d="M346.4 470H165l5 5V349.9v-80-21.4c0-10.3 3.9-20.3 15-23.3 6.4-1.8 14.2-.7 20.7-.7h112.4c3.3 0 6.5 0 9.7 1.1 8.3 2.9 13.5 10.7 13.7 19.3.1 4.1 0 8.3 0 12.5v217.7c0 6.4 10 6.4 10 0v-130-79.5-19.1c-.1-13.8-7.6-26-21-30.5-7.2-2.4-15.8-1.5-23.3-1.5H192.9c-14.8 0-28.7 8.4-32 23.6-1.1 5.2-.8 10.8-.8 16.1V475c0 2.7 2.3 5 5 5h181.4c6.3 0 6.3-10-.1-10z" class="st1"/>
    <path d="M164.9 250.3v120.3c0 6-4.9 11-11 11-17.6 0-31.9-14.4-31.9-31.9v-78.3c0-17.6 14.4-31.9 31.9-31.9 3 0 5.8 1.2 7.7 3.2 2.1 1.8 3.3 4.5 3.3 7.6z" class="st3"/>
    <path d="M159.9 250.3v109.1c0 3.9 1.3 10.8-1 14.3-4.4 7-17.5.4-22.1-3.4-6.2-5.2-9.7-12.7-9.8-20.8-.3-17.8 0-35.6 0-53.3 0-8.3-.1-16.5 0-24.8.1-7.7 3.1-14.9 8.9-20.1 4.7-4.3 23.2-13.2 24-1 .4 6.4 10.4 6.4 10 0-1.7-24.7-33-15.8-43.8-3.2-7.7 9-9.1 19.5-9.1 30.8v68.7c0 13.3 4.7 25.4 15.8 33.3 12.2 8.7 36.4 10.9 37.1-9.5.7-19.1 0-38.3 0-57.4v-62.6c0-6.6-10-6.6-10-.1z" class="st1"/>
    <path d="M122 339.8h42.9c6.4 0 6.4-10 0-10H122c-6.4 0-6.4 10 0 10z" class="st1"/>
    <path d="M344.4 241v235.9h-36V232.1c0-4.8-2.2-9.2-5.9-12.8h11.7c16.6.1 30.2 9.8 30.2 21.7z" class="st4 st5"/>
    <path d="M376 161.2c0 66.4-53.9 120.3-120.3 120.3s-120.3-53.9-120.3-120.3c0-40.5 20-76.2 50.6-98.1 19.7-14 43.7-22.2 69.7-22.2s50 8.2 69.7 22.2C356 84.9 376 120.7 376 161.2z" class="st6"/>
    <path d="M371 161.2c-.3 45-26.7 86.2-67.7 105.1-40.7 18.7-90.5 11.1-123.9-18.6-34.7-30.8-47.8-80.2-32.7-124.2 4-11.7 10-22.7 17.5-32.5 3.6-4.7 7.6-9.1 11.9-13.2 1.8-1.7 3.6-3.3 5.4-4.9 1.1-.9 2.2-1.9 3.4-2.8.8-.6 1.6-1.3 2.5-1.9-1.8-.1-1.8-.2 0-.4 21.7-16.2 50.1-23.6 77-21.8C324 50.3 370.6 101.8 371 161.2c0 6.4 10 6.4 10 0-.4-55.8-38.1-106.2-92.3-120.9-28.7-7.8-59.6-5-86.4 7.5-3.2 1.5-6.3 3.1-9.3 4.9-1.6.9-3.2 1.9-4.8 2.9-.6.4-1.4.8-2 1.3-.4.3-.9.6-1.3.9.4.1.8.2 1.2.2-.3.3-1.5.2-1.9.4l-2.4 1.5c-1.1.8-2.2 1.7-3.3 2.6-2.7 2.1-5.3 4.3-7.8 6.6-9.6 8.9-17.9 19.4-24.2 30.8-25.2 45-19.6 102 13.3 141.5 31.5 37.9 84.1 53.8 131.4 39.9 46.1-13.6 81.7-53.9 88.6-101.6.9-6.2 1.4-12.4 1.4-18.7-.2-6.3-10.2-6.3-10.2.2z" class="st1"/>
    <path d="M249.6 478.1h-96.4c-2.7 0-4.8-2.2-4.8-4.8v-10.8c0-27.2 22.3-49.5 49.5-49.5h7c27.2 0 49.5 22.3 49.5 49.5v10.8c.1 2.7-2.1 4.8-4.8 4.8z" class="st3"/>
    <path d="M249.6 473.1h-93.3c-.5 0-2.7.3-3.1 0-.6-.5.1-7.8.1-9.1 0-5.4.6-10.5 2.3-15.7 7.9-23.8 32.9-33.6 56.2-29.8 14.4 2.3 26.9 11.8 33.2 24.9 2.9 6.1 4.3 12.7 4.3 19.4v6.1c0 2 .8 4.2-1.2 4.5-6.3.9-3.6 10.5 2.7 9.6 6.8-.9 8.5-6.9 8.5-12.8 0-5.1.1-10.2-.6-15.3-2-14.6-10.1-27.7-21.9-36.4-21.6-15.9-55.8-14.2-75.7 3.7-11.2 10.1-17.6 24.6-17.9 39.6-.2 8.4-1.6 20.7 10 21.3 15.1.8 30.4 0 45.5 0h50.7c6.7 0 6.7-10 .2-10z" class="st1"/>
    <path d="M358.2 478.1h-96.6c-2.6 0-4.7-2.1-4.7-4.7v-9.6c0-28 22.9-50.8 50.8-50.8h4.4c28 0 50.8 22.9 50.8 50.8v9.6c0 2.6-2.1 4.7-4.7 4.7z" class="st3"/>
    <path d="M358.2 473.1h-92.7c-.8 0-3.1.4-3.8 0 0 0 .2-6.4.2-7.6 0-5.2.5-10.1 2-15.1 7.3-24 32.6-36.2 56.4-31.7 14 2.7 26 11.7 32.6 24.3 3.2 6.2 4.9 13.1 5 20.1v5.5c0 2.1.8 4.4-1 4.7-6.3.9-3.6 10.5 2.7 9.6 6.6-.9 8.4-6.7 8.4-12.5 0-5.4.1-10.8-.8-16.2-2.4-14.4-10.8-27.2-22.5-35.8-22.3-16.2-56.2-13.8-75.9 5.4-10.5 10.3-16.6 24.5-16.9 39.2-.1 8.3-1.2 19.4 10 20 15.4.9 31.1 0 46.5 0h49.8c6.4.1 6.4-9.9 0-9.9z" class="st1"/>
    <path d="M297.8 366.4h-84.4c-6.6 0-12-5.4-12-12v-47c0-6.6 5.4-12 12-12h84.4c6.6 0 12 5.4 12 12v47c0 6.6-5.4 12-12 12z" class="st3"/>
    <path d="M297.8 361.4h-62.4c-7.3 0-14.8.6-22 0-6.3-.5-7-5.6-7-10.6v-17.4-19.2c0-3.5-.8-8.4 1.6-11.3 2.4-2.8 5.8-2.5 9-2.5h53.6c8.8 0 17.7-.5 26.5 0 5.5.3 7.5 4.1 7.5 9.1v39.6c.2 5.2.6 11.9-6.8 12.3-6.4.3-6.4 10.3 0 10 9.7-.5 16.6-7.6 17-17.2.2-4.7 0-9.4 0-14v-22.8c0-4.1.4-8.5-.2-12.5-1.3-8.5-8.6-14.1-17-14.4-3.4-.1-6.8 0-10.3 0h-43c-10.1 0-20.2-.3-30.3 0-8 .3-15.1 5-17.1 13.1-1 4.1-.5 8.8-.5 13 0 12.5-.4 25 0 37.5.3 8.4 5.8 15.8 14.4 17.2 3.1.5 6.3.2 9.4.2h77.7c6.4-.1 6.4-10.1-.1-10.1z" class="st1"/>
    <circle cx="230.7" cy="316.7" r="10.4" class="st7"/>
    <path d="M236.2 316.7c-.4 7-10.9 7-10.9 0s10.5-7 10.9 0c.3 6.4 10.3 6.4 10 0-.5-8.4-6.7-15.4-15.4-15.4-8.4 0-15.4 7.1-15.4 15.4 0 8.2 6.7 15.1 14.9 15.4 8.9.4 15.6-6.9 16-15.4.2-6.4-9.8-6.4-10.1 0z" class="st1"/>
    <circle cx="230.7" cy="345.2" r="10.4" class="st8"/>
    <path d="M236.2 345.2c-.4 7-10.9 7-10.9 0s10.5-7 10.9 0c.3 6.4 10.3 6.4 10 0-.5-8.4-6.7-15.4-15.4-15.4-8.4 0-15.4 7.1-15.4 15.4 0 8.2 6.7 15.1 14.9 15.4 8.9.4 15.6-6.9 16-15.4.2-6.4-9.8-6.4-10.1 0z" class="st1"/>
    <path d="M371.7 160.3c-.2 47-28.6 87.5-69.2 106.2 21.1-26.3 34.4-60.1 34.4-98.5 0-49.8-21.3-91.8-54.5-118.6-1-.8-2.3-.5-3.3-1.3 15.7 3.5 30 10 42.7 19 30 21.4 50 54.7 49.9 93.2z" class="st4 st5"/>
    <path d="M243.8 87h26.1c6.4 0 6.4-10 0-10h-26.1c-6.4 0-6.5 10 0 10z" class="st1"/>
    <path d="M351 157.8c0 24.5-9.3 46.9-24.5 63.8-2.7 2.9-6.4 4.6-10.4 4.6l-120.4.4c-4 0-7.8-1.6-10.4-4.5-15.5-16.9-24.9-39.5-24.9-64.2 0-20.7 6.6-39.8 17.7-55.4 2.7-3.7 7-6 11.6-6h132c4.6 0 8.9 2.2 11.5 6 11.2 15.5 17.8 34.6 17.8 55.3z" class="st9"/>
    <path d="M346 157.8c-.1 14.7-3.5 29.2-10.4 42.2-3.9 7.4-10.6 20.9-20 21.2-10.5.3-21.1.1-31.6.1-28.8.1-57.7.5-86.5.3-8.6-.1-13.5-8.5-17.8-15.1-7.9-12.3-12.8-26.5-13.9-41.2-1.2-14.9 1.2-30 7.2-43.7 3.4-7.7 8.1-20 17.8-20.2 27.6-.6 55.2 0 82.7 0h41.2c2.3 0 4.8-.2 7.1 0 7 .5 10.2 7.5 13.2 13 3.6 6.5 6.3 13.4 8.2 20.6 1.8 7.5 2.7 15.1 2.8 22.8.1 6.4 10.1 6.4 10 0-.1-15.9-3.8-31.4-10.9-45.6-5.1-10.1-11.3-20.5-23.9-20.8-11.1-.2-22.3 0-33.4 0h-95.5c-7.1 0-13.5 2-18.1 7.9-9.5 12.5-15.5 28.1-17.7 43.6-2.3 15.6-1 31.8 4.1 46.7 2.4 7.2 5.6 14.1 9.6 20.5 3.7 6 8.2 12.9 13.8 17.3 4.8 3.8 10.3 4.1 16.1 4 5.9 0 11.9 0 17.8-.1 18.4-.1 36.9-.1 55.3-.2 13.5 0 27.1-.1 40.6-.1 8.6 0 14.4-3.5 19.8-10.2 9.4-11.7 16.3-25.3 19.7-40 1.8-7.6 2.6-15.4 2.7-23.2 0-6.2-10-6.2-10 .2z" class="st1"/>
    <path d="M181.6 111.8c-4.1 7.1-7.1 14.7-8.6 22.8-1.7 8.6 11.5 12.3 13.2 3.6 1.4-7 3.7-13.3 7.3-19.5 4.4-7.6-7.5-14.5-11.9-6.9zM182.4 166.4c-.4-3-.5-6.5-.4-9.8.1-3.7-3.2-6.9-6.9-6.9-3.8 0-6.7 3.1-6.9 6.9-.2 4.5.2 8.9.9 13.4.5 3.7 5.2 5.7 8.4 4.8 4-1.1 5.4-4.8 4.9-8.4z" class="st3"/>
    <path d="M357.9 465v1c.6 8.8 1.5 7.2-8.3 7.1h-7.8c1.5-1.9 1.8-2.4 1.8-5.1v-1.1c0-14.1-5.3-26.9-13.7-36.2-5.5-6-12.3-10.3-19.8-12.7.8 0 1.6.1 2.4.1 13.1.8 25.1 6 33.2 14.6 8.1 8.6 12.2 19.5 12.2 32.3z" class="st10 st5"/>
    <path d="M362.5 381.5h1.8c13.8 0 25.1-11.3 25.1-25.1v-92.1c0-13.8-11.3-25.1-25.1-25.1h-6.5c-6.3 0-11.4 5.1-11.4 11.4v114.8c0 8.9 7.2 16.1 16.1 16.1z" class="st3"/>
    <path d="M362.5 386.5c17.5 0 31.5-12.6 31.9-30.4.2-8.2 0-16.4 0-24.6 0-22.3.5-44.6 0-66.8-.3-17.1-13.6-30.3-30.8-30.4-7.6-.1-15.3.4-19.7 7.7-2.1 3.5-2.4 7.2-2.4 11v106.4c0 2-.1 4 0 6 .3 11.8 9.2 20.6 21 21.1 6.4.3 6.4-9.7 0-10-10.8-.5-11.1-10-11.1-18.1v-28.5-69c0-4.8-1.6-13.9 3.9-16.2 5-2.1 14.1-.4 18.5 2 6.6 3.6 10.4 10.4 10.5 17.8.4 18.6 0 37.2 0 55.8v32.6c0 3.5.1 6.8-1.1 10.2-3.2 9.1-11.6 13.5-20.7 13.5-6.5-.1-6.5 9.9 0 9.9z" class="st1"/>
    <path d="M346.4 343.9h42.9c6.4 0 6.4-10 0-10h-42.9c-6.4 0-6.5 10 0 10z" class="st1"/>
    <path d="M384.5 269.3v80.5c1.6 20.1-11.2 27.9-24.1 26.2-1.5-.2-3-.4-4.3-1.2 11.2-3.6 19.4-15.1 19.4-28.6v-73c0-13.5-8.2-25-19.4-28.6 2.3-.9 2.8-1.2 4.3-1.2 14.8.1 25.2 10.4 24.1 25.9z" class="st11 st12"/>
    <path d="M371.6 128.9l25.1-23.8" class="st13"/>
    <path d="M375.1 132.4c8.4-7.9 16.7-15.8 25.1-23.8 4.7-4.4-2.4-11.5-7.1-7.1-8.4 7.9-16.7 15.8-25.1 23.8-4.6 4.5 2.4 11.5 7.1 7.1z" class="st1"/>
    <path d="M139.7 128.9l-25.1-23.8" class="st13"/>
    <path d="M143.3 125.3c-8.4-7.9-16.7-15.8-25.1-23.8-4.7-4.4-11.8 2.6-7.1 7.1 8.4 7.9 16.7 15.8 25.1 23.8 4.7 4.4 11.7-2.6 7.1-7.1z" class="st1"/>
    <circle cx="114.6" cy="105.1" r="4.8" class="st14"/>
    <path d="M114.4 105.1c0-.5.1-.1-.1.2.1-.2.5-.7.1-.3-.4.4.1 0 .2-.1.3-.2-.7 0 0 0 .5 0 .1.1-.2-.1.2.1.7.5.3.1-.5-.5.2.2.1.2.1.2.1.2 0-.1-.1-.3-.1-.3 0 .1 0 .7.1-.2.1-.2.1.1-.2.4-.3.5.5-.7.2-.3 0-.1-.3.2.5 0 .2-.1-.6-.1-.4-.1 0 .1-.2-.1-.3-.1-.5-.3.6.6.2.1.1.1-.1-.2-.1-.2 0 0 .1.4.1.4 0 0 .1 2.7 2.2 5 5 5 2.6 0 5.1-2.3 5-5-.3-5.3-4.3-9.8-9.8-9.8-5.4 0-9.7 4.5-9.8 9.8-.1 5.3 4.4 9.6 9.5 9.8 5.6.2 9.8-4.4 10-9.8.1-2.7-2.4-5-5-5-2.7 0-4.7 2.3-4.9 5z" class="st15"/>
    <circle cx="396.7" cy="105.1" r="4.8" class="st16"/>
    <path d="M396.4 105.1c0-.5.1-.1-.1.2.1-.2.5-.7.1-.3-.4.4.1 0 .2-.1.3-.2-.7 0 0 0 .5 0 .1.1-.2-.1.2.1.7.5.3.1-.5-.5.2.2.1.2.1.2.1.2 0-.1-.1-.3-.1-.3 0 .1 0 .7.1-.2.1-.2.1.1-.2.4-.3.5.5-.7.2-.3 0-.1-.3.2.5 0 .2-.1-.6-.1-.4-.1 0 .1-.2-.1-.3-.1-.5-.3.6.6.2.1.1.1 0-.2 0-.2 0 0 .1.4.1.4 0 0 .1 2.7 2.2 5 5 5 2.6 0 5.1-2.3 5-5-.3-5.3-4.3-9.8-9.8-9.8-5.4 0-9.7 4.5-9.8 9.8-.1 5.3 4.4 9.6 9.5 9.8 5.6.2 9.8-4.4 10-9.8.1-2.7-2.4-5-5-5-2.7 0-4.7 2.3-4.9 5z" class="st15"/>
    <path d="M351.9 478.1H376" class="st3"/>
    <g>
      <path d="M138 478.1h-18.3" class="st3"/>
    </g>
    <g>
      <path d="M307.6 397.2h4.6c2.6 0 5.1-2.3 5-5-.1-2.7-2.2-5-5-5h-4.6c-2.6 0-5.1 2.3-5 5 .1 2.7 2.2 5 5 5z" class="st1"/>
    </g>
    <g>
      <path d="M199.2 397.2h4.6c2.6 0 5.1-2.3 5-5-.1-2.7-2.2-5-5-5h-4.6c-2.6 0-5.1 2.3-5 5 .1 2.7 2.2 5 5 5z" class="st1"/>
    </g>
    <g class="st10">
      <path d="M249.5 465v1c.6 8.8 1.5 7.2-8.3 7.1h-7.8c1.5-1.9 1.8-2.4 1.8-5.1v-1.1c0-14.1-5.3-26.9-13.7-36.2-5.5-6-12.3-10.3-19.8-12.7.8 0 1.6.1 2.4.1 13.1.8 26.6 5.6 34.7 14.2 8.1 8.6 10.7 19.9 10.7 32.7z" class="st5"/>
    </g>

  </svg>
    <svg id="planet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <circle class="saturn" cx="256" cy="256" r="149.536" fill="#FF4F54"/>
    <g class="saturn-2" fill="#EA4753">
      <path d="M109.388 285.56c42.515 1.428 157.943-2.613 289.462-73.807-5.11-16.448-13.02-31.882-23.322-45.604-42.716 29.386-140.403 83.922-268.457 76.27-1.354 14.666-.508 29.175 2.318 43.14zM400.734 293.587c3.976-15.31 5.422-30.68 4.614-45.672-33.75 25.31-137.237 92.367-277.65 84.876 6.507 10.874 14.383 20.93 23.472 29.88 44.354.286 137.696-6.443 245.93-57.163 1.362-3.89 2.58-7.86 3.634-11.92zM245.488 405.184c35.427 2.537 69.784-7.742 97.543-27.59-27.972 11.533-60.787 21.76-97.542 27.59zM348.02 138.097c-15.645-12.225-33.99-21.522-54.434-26.832-71.883-18.667-145.126 18.253-174.25 84.01 49.02-1.676 133.073-12.256 228.685-57.178z"/>
    </g>
    <circle class="hover" cx="319.166" cy="208.081" r="28.389" fill="#D83A4E"/>
    <path d="M331.25 189.492c6.04 1.568 11.114 4.97 14.792 9.452-2.98-8.73-10.143-15.848-19.74-18.34-15.175-3.94-30.672 5.167-34.613 20.342-2.373 9.136-.012 18.384 5.55 25.162-1.73-5.075-2.05-10.695-.602-16.273 3.94-15.177 19.438-24.284 34.613-20.343z" opacity=".1"/>
    <circle class="hover" cx="234.463" cy="273.978" r="19.358" fill="#D83A4E"/>
    <path d="M242.703 261.303c4.118 1.07 7.578 3.39 10.085 6.444-2.03-5.953-6.916-10.806-13.46-12.505-10.347-2.687-20.914 3.523-23.6 13.87-1.62 6.23-.008 12.537 3.785 17.158-1.18-3.46-1.398-7.293-.41-11.097 2.686-10.348 13.252-16.558 23.6-13.87z" opacity=".1"/>
    <circle class="hover" cx="307.493" cy="144.207" r="12.584" fill="#D83A4E"/>
    <path d="M312.85 135.967c2.678.695 4.927 2.204 6.557 4.19-1.32-3.872-4.496-7.026-8.75-8.13-6.727-1.747-13.596 2.29-15.343 9.017-1.052 4.05-.005 8.15 2.46 11.153-.767-2.25-.908-4.74-.267-7.213 1.747-6.727 8.616-10.764 15.343-9.017z" opacity=".1"/>
    <circle class="hover" cx="163.289" cy="255.495" r="19.358" fill="#D83A4E"/>
    <path d="M171.53 242.82c4.118 1.068 7.577 3.388 10.084 6.443-2.03-5.954-6.916-10.806-13.46-12.505-10.348-2.687-20.915 3.523-23.602 13.87-1.618 6.23-.008 12.536 3.785 17.158-1.18-3.46-1.398-7.293-.41-11.097 2.687-10.348 13.255-16.558 23.602-13.87z" opacity=".1"/>
    <circle class="hover" cx="230.586" cy="365.92" r="19.358" fill="#D83A4E"/>
    <path d="M238.826 353.245c4.118 1.07 7.578 3.39 10.085 6.444-2.03-5.954-6.915-10.807-13.46-12.506-10.347-2.688-20.914 3.522-23.6 13.87-1.62 6.23-.01 12.536 3.784 17.157-1.18-3.46-1.398-7.292-.41-11.096 2.688-10.346 13.255-16.556 23.602-13.87z" opacity=".1"/>
    <circle class="hover" cx="302.221" cy="353.781" r="19.357" fill="#D83A4E"/>
    <path d="M310.462 341.105c4.118 1.07 7.577 3.39 10.085 6.445-2.03-5.954-6.916-10.807-13.46-12.506-10.348-2.688-20.914 3.523-23.602 13.87-1.618 6.23-.008 12.536 3.785 17.157-1.18-3.46-1.398-7.29-.41-11.095 2.687-10.346 13.254-16.556 23.602-13.87z" opacity=".1"/>
    <circle class="hover" cx="358.827" cy="284.847" r="11.079" fill="#D83A4E"/>
    <path d="M363.542 277.593c2.357.612 4.337 1.94 5.772 3.688-1.162-3.406-3.958-6.184-7.703-7.156-5.922-1.537-11.97 2.017-13.507 7.938-.926 3.565-.005 7.175 2.166 9.82-.676-1.98-.8-4.175-.235-6.352 1.537-5.92 7.585-9.475 13.507-7.937z" opacity=".1"/>
    <circle class="hover" cx="220.465" cy="156.416" r="11.079" fill="#D83A4E"/>
    <path d="M225.18 149.162c2.358.612 4.338 1.94 5.773 3.688-1.162-3.408-3.958-6.185-7.703-7.157-5.922-1.538-11.97 2.016-13.508 7.938-.926 3.566-.004 7.175 2.167 9.82-.677-1.98-.8-4.174-.236-6.35 1.537-5.922 7.585-9.476 13.507-7.938z" opacity=".1"/>
    <circle class="hover" cx="154.027" cy="171.743" r="5.819" fill="#D83A4E"/>
    <path d="M156.504 167.933c1.238.322 2.278 1.02 3.03 1.938-.61-1.79-2.078-3.248-4.045-3.758-3.11-.808-6.288 1.06-7.095 4.17-.486 1.872-.002 3.767 1.138 5.156-.354-1.04-.42-2.192-.124-3.335.807-3.11 3.984-4.978 7.094-4.17z" opacity=".1"/>
    <circle class="hover" cx="391.387" cy="251.305" r="5.819" fill="#D83A4E"/>
    <path d="M393.864 247.495c1.237.32 2.277 1.02 3.03 1.937-.61-1.79-2.078-3.248-4.045-3.76-3.11-.807-6.288 1.06-7.096 4.17-.486 1.873-.002 3.768 1.138 5.158-.354-1.04-.42-2.192-.123-3.336.807-3.11 3.983-4.977 7.094-4.17z" opacity=".1"/>
    <circle class="hover" cx="145.077" cy="302.473" r="5.819" fill="#D83A4E"/>
    <path d="M147.554 298.662c1.238.322 2.277 1.02 3.03 1.938-.61-1.79-2.078-3.248-4.045-3.76-3.11-.807-6.288 1.06-7.096 4.17-.486 1.873-.002 3.77 1.138 5.157-.355-1.04-.42-2.19-.124-3.335.81-3.11 3.985-4.978 7.096-4.17z" opacity=".1"/>
    <circle class="hover" cx="187.342" cy="355.265" r="5.819" fill="#D83A4E"/>
    <path d="M189.818 351.455c1.238.32 2.278 1.02 3.032 1.938-.61-1.79-2.08-3.25-4.046-3.76-3.11-.808-6.287 1.06-7.095 4.17-.487 1.872-.003 3.768 1.137 5.157-.354-1.04-.42-2.192-.123-3.336.808-3.11 3.984-4.977 7.094-4.17z" opacity=".1"/>
    <path d="M351.36 140.785c10.244 27.673 12.43 58.646 4.45 89.372-20.76 79.935-102.387 127.907-182.32 107.15-21.917-5.693-41.423-15.968-57.776-29.522 16.405 44.32 53.49 80.17 102.7 92.95 79.934 20.758 161.562-27.214 182.32-107.148 15.068-58.02-6.082-116.922-49.373-152.802z" opacity=".1"/>
    <g>
      <path class="stars" fill="#FFF" d="M112.456 363.093c-.056 7.866-6.478 14.197-14.344 14.142 7.866.056 14.198 6.48 14.142 14.345.056-7.866 6.48-14.198 14.345-14.142-7.868-.057-14.2-6.48-14.144-14.345zM432.436 274.908c-.056 7.866-6.478 14.198-14.344 14.142 7.866.057 14.197 6.48 14.142 14.345.056-7.866 6.48-14.197 14.345-14.142-7.868-.056-14.2-6.48-14.144-14.345zM159.75 58.352c-.12 16.537-13.62 29.848-30.157 29.73 16.537.118 29.848 13.62 29.73 30.156.118-16.537 13.62-29.848 30.156-29.73-16.54-.117-29.85-13.62-29.73-30.156z"/>
    </g>
  </svg>
    <a href="{{domain}}"><button class="denied__link">Go Home</button></a>
  </div>
  <script>
function hexToRgb(e){var a=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;e=e.replace(a,function(e,a,t,i){return a+a+t+t+i+i});var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?{r:parseInt(t[1],16),g:parseInt(t[2],16),b:parseInt(t[3],16)}:null}function clamp(e,a,t){return Math.min(Math.max(e,a),t)}function isInArray(e,a){return a.indexOf(e)>-1}var pJS=function(e,a){var t=document.querySelector("#"+e+" > .particles-js-canvas-el");this.pJS={canvas:{el:t,w:t.offsetWidth,h:t.offsetHeight},particles:{number:{value:400,density:{enable:!0,value_area:800}},color:{value:"#fff"},shape:{type:"circle",stroke:{width:0,color:"#ff0000"},polygon:{nb_sides:5},image:{src:"",width:100,height:100}},opacity:{value:1,random:!1,anim:{enable:!1,speed:2,opacity_min:0,sync:!1}},size:{value:20,random:!1,anim:{enable:!1,speed:20,size_min:0,sync:!1}},line_linked:{enable:!0,distance:100,color:"#fff",opacity:1,width:1},move:{enable:!0,speed:2,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:3e3,rotateY:3e3}},array:[]},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"grab"},onclick:{enable:!0,mode:"push"},resize:!0},modes:{grab:{distance:100,line_linked:{opacity:1}},bubble:{distance:200,size:80,duration:.4},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}},mouse:{}},retina_detect:!1,fn:{interact:{},modes:{},vendors:{}},tmp:{}};var i=this.pJS;a&&Object.deepExtend(i,a),i.tmp.obj={size_value:i.particles.size.value,size_anim_speed:i.particles.size.anim.speed,move_speed:i.particles.move.speed,line_linked_distance:i.particles.line_linked.distance,line_linked_width:i.particles.line_linked.width,mode_grab_distance:i.interactivity.modes.grab.distance,mode_bubble_distance:i.interactivity.modes.bubble.distance,mode_bubble_size:i.interactivity.modes.bubble.size,mode_repulse_distance:i.interactivity.modes.repulse.distance},i.fn.retinaInit=function(){i.retina_detect&&window.devicePixelRatio>1?(i.canvas.pxratio=window.devicePixelRatio,i.tmp.retina=!0):(i.canvas.pxratio=1,i.tmp.retina=!1),i.canvas.w=i.canvas.el.offsetWidth*i.canvas.pxratio,i.canvas.h=i.canvas.el.offsetHeight*i.canvas.pxratio,i.particles.size.value=i.tmp.obj.size_value*i.canvas.pxratio,i.particles.size.anim.speed=i.tmp.obj.size_anim_speed*i.canvas.pxratio,i.particles.move.speed=i.tmp.obj.move_speed*i.canvas.pxratio,i.particles.line_linked.distance=i.tmp.obj.line_linked_distance*i.canvas.pxratio,i.interactivity.modes.grab.distance=i.tmp.obj.mode_grab_distance*i.canvas.pxratio,i.interactivity.modes.bubble.distance=i.tmp.obj.mode_bubble_distance*i.canvas.pxratio,i.particles.line_linked.width=i.tmp.obj.line_linked_width*i.canvas.pxratio,i.interactivity.modes.bubble.size=i.tmp.obj.mode_bubble_size*i.canvas.pxratio,i.interactivity.modes.repulse.distance=i.tmp.obj.mode_repulse_distance*i.canvas.pxratio},i.fn.canvasInit=function(){i.canvas.ctx=i.canvas.el.getContext("2d")},i.fn.canvasSize=function(){i.canvas.el.width=i.canvas.w,i.canvas.el.height=i.canvas.h,i&&i.interactivity.events.resize&&window.addEventListener("resize",function(){i.canvas.w=i.canvas.el.offsetWidth,i.canvas.h=i.canvas.el.offsetHeight,i.tmp.retina&&(i.canvas.w*=i.canvas.pxratio,i.canvas.h*=i.canvas.pxratio),i.canvas.el.width=i.canvas.w,i.canvas.el.height=i.canvas.h,i.particles.move.enable||(i.fn.particlesEmpty(),i.fn.particlesCreate(),i.fn.particlesDraw(),i.fn.vendors.densityAutoParticles()),i.fn.vendors.densityAutoParticles()})},i.fn.canvasPaint=function(){i.canvas.ctx.fillRect(0,0,i.canvas.w,i.canvas.h)},i.fn.canvasClear=function(){i.canvas.ctx.clearRect(0,0,i.canvas.w,i.canvas.h)},i.fn.particle=function(e,a,t){if(this.radius=(i.particles.size.random?Math.random():1)*i.particles.size.value,i.particles.size.anim.enable&&(this.size_status=!1,this.vs=i.particles.size.anim.speed/100,i.particles.size.anim.sync||(this.vs=this.vs*Math.random())),this.x=t?t.x:Math.random()*i.canvas.w,this.y=t?t.y:Math.random()*i.canvas.h,this.x>i.canvas.w-2*this.radius?this.x=this.x-this.radius:this.x<2*this.radius&&(this.x=this.x+this.radius),this.y>i.canvas.h-2*this.radius?this.y=this.y-this.radius:this.y<2*this.radius&&(this.y=this.y+this.radius),i.particles.move.bounce&&i.fn.vendors.checkOverlap(this,t),this.color={},"object"==typeof e.value)if(e.value instanceof Array){var s=e.value[Math.floor(Math.random()*i.particles.color.value.length)];this.color.rgb=hexToRgb(s)}else void 0!=e.value.r&&void 0!=e.value.g&&void 0!=e.value.b&&(this.color.rgb={r:e.value.r,g:e.value.g,b:e.value.b}),void 0!=e.value.h&&void 0!=e.value.s&&void 0!=e.value.l&&(this.color.hsl={h:e.value.h,s:e.value.s,l:e.value.l});else"random"==e.value?this.color.rgb={r:Math.floor(256*Math.random())+0,g:Math.floor(256*Math.random())+0,b:Math.floor(256*Math.random())+0}:"string"==typeof e.value&&(this.color=e,this.color.rgb=hexToRgb(this.color.value));this.opacity=(i.particles.opacity.random?Math.random():1)*i.particles.opacity.value,i.particles.opacity.anim.enable&&(this.opacity_status=!1,this.vo=i.particles.opacity.anim.speed/100,i.particles.opacity.anim.sync||(this.vo=this.vo*Math.random()));var n={};switch(i.particles.move.direction){case"top":n={x:0,y:-1};break;case"top-right":n={x:.5,y:-.5};break;case"right":n={x:1,y:-0};break;case"bottom-right":n={x:.5,y:.5};break;case"bottom":n={x:0,y:1};break;case"bottom-left":n={x:-.5,y:1};break;case"left":n={x:-1,y:0};break;case"top-left":n={x:-.5,y:-.5};break;default:n={x:0,y:0}}i.particles.move.straight?(this.vx=n.x,this.vy=n.y,i.particles.move.random&&(this.vx=this.vx*Math.random(),this.vy=this.vy*Math.random())):(this.vx=n.x+Math.random()-.5,this.vy=n.y+Math.random()-.5),this.vx_i=this.vx,this.vy_i=this.vy;var r=i.particles.shape.type;if("object"==typeof r){if(r instanceof Array){var c=r[Math.floor(Math.random()*r.length)];this.shape=c}}else this.shape=r;if("image"==this.shape){var o=i.particles.shape;this.img={src:o.image.src,ratio:o.image.width/o.image.height},this.img.ratio||(this.img.ratio=1),"svg"==i.tmp.img_type&&void 0!=i.tmp.source_svg&&(i.fn.vendors.createSvgImg(this),i.tmp.pushing&&(this.img.loaded=!1))}},i.fn.particle.prototype.draw=function(){function e(){i.canvas.ctx.drawImage(r,a.x-t,a.y-t,2*t,2*t/a.img.ratio)}var a=this;if(void 0!=a.radius_bubble)var t=a.radius_bubble;else var t=a.radius;if(void 0!=a.opacity_bubble)var s=a.opacity_bubble;else var s=a.opacity;if(a.color.rgb)var n="rgba("+a.color.rgb.r+","+a.color.rgb.g+","+a.color.rgb.b+","+s+")";else var n="hsla("+a.color.hsl.h+","+a.color.hsl.s+"%,"+a.color.hsl.l+"%,"+s+")";switch(i.canvas.ctx.fillStyle=n,i.canvas.ctx.beginPath(),a.shape){case"circle":i.canvas.ctx.arc(a.x,a.y,t,0,2*Math.PI,!1);break;case"edge":i.canvas.ctx.rect(a.x-t,a.y-t,2*t,2*t);break;case"triangle":i.fn.vendors.drawShape(i.canvas.ctx,a.x-t,a.y+t/1.66,2*t,3,2);break;case"polygon":i.fn.vendors.drawShape(i.canvas.ctx,a.x-t/(i.particles.shape.polygon.nb_sides/3.5),a.y-t/.76,2.66*t/(i.particles.shape.polygon.nb_sides/3),i.particles.shape.polygon.nb_sides,1);break;case"star":i.fn.vendors.drawShape(i.canvas.ctx,a.x-2*t/(i.particles.shape.polygon.nb_sides/4),a.y-t/1.52,2*t*2.66/(i.particles.shape.polygon.nb_sides/3),i.particles.shape.polygon.nb_sides,2);break;case"image":if("svg"==i.tmp.img_type)var r=a.img.obj;else var r=i.tmp.img_obj;r&&e()}i.canvas.ctx.closePath(),i.particles.shape.stroke.width>0&&(i.canvas.ctx.strokeStyle=i.particles.shape.stroke.color,i.canvas.ctx.lineWidth=i.particles.shape.stroke.width,i.canvas.ctx.stroke()),i.canvas.ctx.fill()},i.fn.particlesCreate=function(){for(var e=0;e<i.particles.number.value;e++)i.particles.array.push(new i.fn.particle(i.particles.color,i.particles.opacity.value))},i.fn.particlesUpdate=function(){for(var e=0;e<i.particles.array.length;e++){var a=i.particles.array[e];if(i.particles.move.enable){var t=i.particles.move.speed/2;a.x+=a.vx*t,a.y+=a.vy*t}if(i.particles.opacity.anim.enable&&(1==a.opacity_status?(a.opacity>=i.particles.opacity.value&&(a.opacity_status=!1),a.opacity+=a.vo):(a.opacity<=i.particles.opacity.anim.opacity_min&&(a.opacity_status=!0),a.opacity-=a.vo),a.opacity<0&&(a.opacity=0)),i.particles.size.anim.enable&&(1==a.size_status?(a.radius>=i.particles.size.value&&(a.size_status=!1),a.radius+=a.vs):(a.radius<=i.particles.size.anim.size_min&&(a.size_status=!0),a.radius-=a.vs),a.radius<0&&(a.radius=0)),"bounce"==i.particles.move.out_mode)var s={x_left:a.radius,x_right:i.canvas.w,y_top:a.radius,y_bottom:i.canvas.h};else var s={x_left:-a.radius,x_right:i.canvas.w+a.radius,y_top:-a.radius,y_bottom:i.canvas.h+a.radius};switch(a.x-a.radius>i.canvas.w?(a.x=s.x_left,a.y=Math.random()*i.canvas.h):a.x+a.radius<0&&(a.x=s.x_right,a.y=Math.random()*i.canvas.h),a.y-a.radius>i.canvas.h?(a.y=s.y_top,a.x=Math.random()*i.canvas.w):a.y+a.radius<0&&(a.y=s.y_bottom,a.x=Math.random()*i.canvas.w),i.particles.move.out_mode){case"bounce":a.x+a.radius>i.canvas.w?a.vx=-a.vx:a.x-a.radius<0&&(a.vx=-a.vx),a.y+a.radius>i.canvas.h?a.vy=-a.vy:a.y-a.radius<0&&(a.vy=-a.vy)}if(isInArray("grab",i.interactivity.events.onhover.mode)&&i.fn.modes.grabParticle(a),(isInArray("bubble",i.interactivity.events.onhover.mode)||isInArray("bubble",i.interactivity.events.onclick.mode))&&i.fn.modes.bubbleParticle(a),(isInArray("repulse",i.interactivity.events.onhover.mode)||isInArray("repulse",i.interactivity.events.onclick.mode))&&i.fn.modes.repulseParticle(a),i.particles.line_linked.enable||i.particles.move.attract.enable)for(var n=e+1;n<i.particles.array.length;n++){var r=i.particles.array[n];i.particles.line_linked.enable&&i.fn.interact.linkParticles(a,r),i.particles.move.attract.enable&&i.fn.interact.attractParticles(a,r),i.particles.move.bounce&&i.fn.interact.bounceParticles(a,r)}}},i.fn.particlesDraw=function(){i.canvas.ctx.clearRect(0,0,i.canvas.w,i.canvas.h),i.fn.particlesUpdate();for(var e=0;e<i.particles.array.length;e++){var a=i.particles.array[e];a.draw()}},i.fn.particlesEmpty=function(){i.particles.array=[]},i.fn.particlesRefresh=function(){cancelRequestAnimFrame(i.fn.checkAnimFrame),cancelRequestAnimFrame(i.fn.drawAnimFrame),i.tmp.source_svg=void 0,i.tmp.img_obj=void 0,i.tmp.count_svg=0,i.fn.particlesEmpty(),i.fn.canvasClear(),i.fn.vendors.start()},i.fn.interact.linkParticles=function(e,a){var t=e.x-a.x,s=e.y-a.y,n=Math.sqrt(t*t+s*s);if(n<=i.particles.line_linked.distance){var r=i.particles.line_linked.opacity-n/(1/i.particles.line_linked.opacity)/i.particles.line_linked.distance;if(r>0){var c=i.particles.line_linked.color_rgb_line;i.canvas.ctx.strokeStyle="rgba("+c.r+","+c.g+","+c.b+","+r+")",i.canvas.ctx.lineWidth=i.particles.line_linked.width,i.canvas.ctx.beginPath(),i.canvas.ctx.moveTo(e.x,e.y),i.canvas.ctx.lineTo(a.x,a.y),i.canvas.ctx.stroke(),i.canvas.ctx.closePath()}}},i.fn.interact.attractParticles=function(e,a){var t=e.x-a.x,s=e.y-a.y,n=Math.sqrt(t*t+s*s);if(n<=i.particles.line_linked.distance){var r=t/(1e3*i.particles.move.attract.rotateX),c=s/(1e3*i.particles.move.attract.rotateY);e.vx-=r,e.vy-=c,a.vx+=r,a.vy+=c}},i.fn.interact.bounceParticles=function(e,a){var t=e.x-a.x,i=e.y-a.y,s=Math.sqrt(t*t+i*i),n=e.radius+a.radius;n>=s&&(e.vx=-e.vx,e.vy=-e.vy,a.vx=-a.vx,a.vy=-a.vy)},i.fn.modes.pushParticles=function(e,a){i.tmp.pushing=!0;for(var t=0;e>t;t++)i.particles.array.push(new i.fn.particle(i.particles.color,i.particles.opacity.value,{x:a?a.pos_x:Math.random()*i.canvas.w,y:a?a.pos_y:Math.random()*i.canvas.h})),t==e-1&&(i.particles.move.enable||i.fn.particlesDraw(),i.tmp.pushing=!1)},i.fn.modes.removeParticles=function(e){i.particles.array.splice(0,e),i.particles.move.enable||i.fn.particlesDraw()},i.fn.modes.bubbleParticle=function(e){function a(){e.opacity_bubble=e.opacity,e.radius_bubble=e.radius}function t(a,t,s,n,c){if(a!=t)if(i.tmp.bubble_duration_end){if(void 0!=s){var o=n-p*(n-a)/i.interactivity.modes.bubble.duration,l=a-o;d=a+l,"size"==c&&(e.radius_bubble=d),"opacity"==c&&(e.opacity_bubble=d)}}else if(r<=i.interactivity.modes.bubble.distance){if(void 0!=s)var v=s;else var v=n;if(v!=a){var d=n-p*(n-a)/i.interactivity.modes.bubble.duration;"size"==c&&(e.radius_bubble=d),"opacity"==c&&(e.opacity_bubble=d)}}else"size"==c&&(e.radius_bubble=void 0),"opacity"==c&&(e.opacity_bubble=void 0)}if(i.interactivity.events.onhover.enable&&isInArray("bubble",i.interactivity.events.onhover.mode)){var s=e.x-i.interactivity.mouse.pos_x,n=e.y-i.interactivity.mouse.pos_y,r=Math.sqrt(s*s+n*n),c=1-r/i.interactivity.modes.bubble.distance;if(r<=i.interactivity.modes.bubble.distance){if(c>=0&&"mousemove"==i.interactivity.status){if(i.interactivity.modes.bubble.size!=i.particles.size.value)if(i.interactivity.modes.bubble.size>i.particles.size.value){var o=e.radius+i.interactivity.modes.bubble.size*c;o>=0&&(e.radius_bubble=o)}else{var l=e.radius-i.interactivity.modes.bubble.size,o=e.radius-l*c;o>0?e.radius_bubble=o:e.radius_bubble=0}if(i.interactivity.modes.bubble.opacity!=i.particles.opacity.value)if(i.interactivity.modes.bubble.opacity>i.particles.opacity.value){var v=i.interactivity.modes.bubble.opacity*c;v>e.opacity&&v<=i.interactivity.modes.bubble.opacity&&(e.opacity_bubble=v)}else{var v=e.opacity-(i.particles.opacity.value-i.interactivity.modes.bubble.opacity)*c;v<e.opacity&&v>=i.interactivity.modes.bubble.opacity&&(e.opacity_bubble=v)}}}else a();"mouseleave"==i.interactivity.status&&a()}else if(i.interactivity.events.onclick.enable&&isInArray("bubble",i.interactivity.events.onclick.mode)){if(i.tmp.bubble_clicking){var s=e.x-i.interactivity.mouse.click_pos_x,n=e.y-i.interactivity.mouse.click_pos_y,r=Math.sqrt(s*s+n*n),p=((new Date).getTime()-i.interactivity.mouse.click_time)/1e3;p>i.interactivity.modes.bubble.duration&&(i.tmp.bubble_duration_end=!0),p>2*i.interactivity.modes.bubble.duration&&(i.tmp.bubble_clicking=!1,i.tmp.bubble_duration_end=!1)}i.tmp.bubble_clicking&&(t(i.interactivity.modes.bubble.size,i.particles.size.value,e.radius_bubble,e.radius,"size"),t(i.interactivity.modes.bubble.opacity,i.particles.opacity.value,e.opacity_bubble,e.opacity,"opacity"))}},i.fn.modes.repulseParticle=function(e){function a(){var a=Math.atan2(d,p);if(e.vx=u*Math.cos(a),e.vy=u*Math.sin(a),"bounce"==i.particles.move.out_mode){var t={x:e.x+e.vx,y:e.y+e.vy};t.x+e.radius>i.canvas.w?e.vx=-e.vx:t.x-e.radius<0&&(e.vx=-e.vx),t.y+e.radius>i.canvas.h?e.vy=-e.vy:t.y-e.radius<0&&(e.vy=-e.vy)}}if(i.interactivity.events.onhover.enable&&isInArray("repulse",i.interactivity.events.onhover.mode)&&"mousemove"==i.interactivity.status){var t=e.x-i.interactivity.mouse.pos_x,s=e.y-i.interactivity.mouse.pos_y,n=Math.sqrt(t*t+s*s),r={x:t/n,y:s/n},c=i.interactivity.modes.repulse.distance,o=100,l=clamp(1/c*(-1*Math.pow(n/c,2)+1)*c*o,0,50),v={x:e.x+r.x*l,y:e.y+r.y*l};"bounce"==i.particles.move.out_mode?(v.x-e.radius>0&&v.x+e.radius<i.canvas.w&&(e.x=v.x),v.y-e.radius>0&&v.y+e.radius<i.canvas.h&&(e.y=v.y)):(e.x=v.x,e.y=v.y)}else if(i.interactivity.events.onclick.enable&&isInArray("repulse",i.interactivity.events.onclick.mode))if(i.tmp.repulse_finish||(i.tmp.repulse_count++,i.tmp.repulse_count==i.particles.array.length&&(i.tmp.repulse_finish=!0)),i.tmp.repulse_clicking){var c=Math.pow(i.interactivity.modes.repulse.distance/6,3),p=i.interactivity.mouse.click_pos_x-e.x,d=i.interactivity.mouse.click_pos_y-e.y,m=p*p+d*d,u=-c/m*1;c>=m&&a()}else 0==i.tmp.repulse_clicking&&(e.vx=e.vx_i,e.vy=e.vy_i)},i.fn.modes.grabParticle=function(e){if(i.interactivity.events.onhover.enable&&"mousemove"==i.interactivity.status){var a=e.x-i.interactivity.mouse.pos_x,t=e.y-i.interactivity.mouse.pos_y,s=Math.sqrt(a*a+t*t);if(s<=i.interactivity.modes.grab.distance){var n=i.interactivity.modes.grab.line_linked.opacity-s/(1/i.interactivity.modes.grab.line_linked.opacity)/i.interactivity.modes.grab.distance;if(n>0){var r=i.particles.line_linked.color_rgb_line;i.canvas.ctx.strokeStyle="rgba("+r.r+","+r.g+","+r.b+","+n+")",i.canvas.ctx.lineWidth=i.particles.line_linked.width,i.canvas.ctx.beginPath(),i.canvas.ctx.moveTo(e.x,e.y),i.canvas.ctx.lineTo(i.interactivity.mouse.pos_x,i.interactivity.mouse.pos_y),i.canvas.ctx.stroke(),i.canvas.ctx.closePath()}}}},i.fn.vendors.eventsListeners=function(){"window"==i.interactivity.detect_on?i.interactivity.el=window:i.interactivity.el=i.canvas.el,(i.interactivity.events.onhover.enable||i.interactivity.events.onclick.enable)&&(i.interactivity.el.addEventListener("mousemove",function(e){if(i.interactivity.el==window)var a=e.clientX,t=e.clientY;else var a=e.offsetX||e.clientX,t=e.offsetY||e.clientY;i.interactivity.mouse.pos_x=a,i.interactivity.mouse.pos_y=t,i.tmp.retina&&(i.interactivity.mouse.pos_x*=i.canvas.pxratio,i.interactivity.mouse.pos_y*=i.canvas.pxratio),i.interactivity.status="mousemove"}),i.interactivity.el.addEventListener("mouseleave",function(e){i.interactivity.mouse.pos_x=null,i.interactivity.mouse.pos_y=null,i.interactivity.status="mouseleave"})),i.interactivity.events.onclick.enable&&i.interactivity.el.addEventListener("click",function(){if(i.interactivity.mouse.click_pos_x=i.interactivity.mouse.pos_x,i.interactivity.mouse.click_pos_y=i.interactivity.mouse.pos_y,i.interactivity.mouse.click_time=(new Date).getTime(),i.interactivity.events.onclick.enable)switch(i.interactivity.events.onclick.mode){case"push":i.particles.move.enable?i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb,i.interactivity.mouse):1==i.interactivity.modes.push.particles_nb?i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb,i.interactivity.mouse):i.interactivity.modes.push.particles_nb>1&&i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb);break;case"remove":i.fn.modes.removeParticles(i.interactivity.modes.remove.particles_nb);break;case"bubble":i.tmp.bubble_clicking=!0;break;case"repulse":i.tmp.repulse_clicking=!0,i.tmp.repulse_count=0,i.tmp.repulse_finish=!1,setTimeout(function(){i.tmp.repulse_clicking=!1},1e3*i.interactivity.modes.repulse.duration)}})},i.fn.vendors.densityAutoParticles=function(){if(i.particles.number.density.enable){var e=i.canvas.el.width*i.canvas.el.height/1e3;i.tmp.retina&&(e/=2*i.canvas.pxratio);var a=e*i.particles.number.value/i.particles.number.density.value_area,t=i.particles.array.length-a;0>t?i.fn.modes.pushParticles(Math.abs(t)):i.fn.modes.removeParticles(t)}},i.fn.vendors.checkOverlap=function(e,a){for(var t=0;t<i.particles.array.length;t++){var s=i.particles.array[t],n=e.x-s.x,r=e.y-s.y,c=Math.sqrt(n*n+r*r);c<=e.radius+s.radius&&(e.x=a?a.x:Math.random()*i.canvas.w,e.y=a?a.y:Math.random()*i.canvas.h,i.fn.vendors.checkOverlap(e))}},i.fn.vendors.createSvgImg=function(e){var a=i.tmp.source_svg,t=/#([0-9A-F]{3,6})/gi,s=a.replace(t,function(a,t,i,s){if(e.color.rgb)var n="rgba("+e.color.rgb.r+","+e.color.rgb.g+","+e.color.rgb.b+","+e.opacity+")";else var n="hsla("+e.color.hsl.h+","+e.color.hsl.s+"%,"+e.color.hsl.l+"%,"+e.opacity+")";return n}),n=new Blob([s],{type:"image/svg+xml;charset=utf-8"}),r=window.URL||window.webkitURL||window,c=r.createObjectURL(n),o=new Image;o.addEventListener("load",function(){e.img.obj=o,e.img.loaded=!0,r.revokeObjectURL(c),i.tmp.count_svg++}),o.src=c},i.fn.vendors.destroypJS=function(){cancelAnimationFrame(i.fn.drawAnimFrame),t.remove(),pJSDom=null},i.fn.vendors.drawShape=function(e,a,t,i,s,n){var r=s*n,c=s/n,o=180*(c-2)/c,l=Math.PI-Math.PI*o/180;e.save(),e.beginPath(),e.translate(a,t),e.moveTo(0,0);for(var v=0;r>v;v++)e.lineTo(i,0),e.translate(i,0),e.rotate(l);e.fill(),e.restore()},i.fn.vendors.exportImg=function(){window.open(i.canvas.el.toDataURL("image/png"),"_blank")},i.fn.vendors.loadImg=function(e){if(i.tmp.img_error=void 0,""!=i.particles.shape.image.src)if("svg"==e){var a=new XMLHttpRequest;a.open("GET",i.particles.shape.image.src),a.onreadystatechange=function(e){4==a.readyState&&(200==a.status?(i.tmp.source_svg=e.currentTarget.response,i.fn.vendors.checkBeforeDraw()):(console.log("Error pJS - Image not found"),i.tmp.img_error=!0))},a.send()}else{var t=new Image;t.addEventListener("load",function(){i.tmp.img_obj=t,i.fn.vendors.checkBeforeDraw()}),t.src=i.particles.shape.image.src}else console.log("Error pJS - No image.src"),i.tmp.img_error=!0},i.fn.vendors.draw=function(){"image"==i.particles.shape.type?"svg"==i.tmp.img_type?i.tmp.count_svg>=i.particles.number.value?(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame)):i.tmp.img_error||(i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw)):void 0!=i.tmp.img_obj?(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame)):i.tmp.img_error||(i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw)):(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame))},i.fn.vendors.checkBeforeDraw=function(){"image"==i.particles.shape.type?"svg"==i.tmp.img_type&&void 0==i.tmp.source_svg?i.tmp.checkAnimFrame=requestAnimFrame(check):(cancelRequestAnimFrame(i.tmp.checkAnimFrame),i.tmp.img_error||(i.fn.vendors.init(),i.fn.vendors.draw())):(i.fn.vendors.init(),i.fn.vendors.draw())},i.fn.vendors.init=function(){i.fn.retinaInit(),i.fn.canvasInit(),i.fn.canvasSize(),i.fn.canvasPaint(),i.fn.particlesCreate(),i.fn.vendors.densityAutoParticles(),i.particles.line_linked.color_rgb_line=hexToRgb(i.particles.line_linked.color)},i.fn.vendors.start=function(){isInArray("image",i.particles.shape.type)?(i.tmp.img_type=i.particles.shape.image.src.substr(i.particles.shape.image.src.length-3),i.fn.vendors.loadImg(i.tmp.img_type)):i.fn.vendors.checkBeforeDraw()},i.fn.vendors.eventsListeners(),i.fn.vendors.start()};Object.deepExtend=function(e,a){for(var t in a)a[t]&&a[t].constructor&&a[t].constructor===Object?(e[t]=e[t]||{},arguments.callee(e[t],a[t])):e[t]=a[t];return e},window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}(),window.cancelRequestAnimFrame=function(){return window.cancelAnimationFrame||window.webkitCancelRequestAnimationFrame||window.mozCancelRequestAnimationFrame||window.oCancelRequestAnimationFrame||window.msCancelRequestAnimationFrame||clearTimeout}(),window.pJSDom=[],window.particlesJS=function(e,a){"string"!=typeof e&&(a=e,e="particles-js"),e||(e="particles-js");var t=document.getElementById(e),i="particles-js-canvas-el",s=t.getElementsByClassName(i);if(s.length)for(;s.length>0;)t.removeChild(s[0]);var n=document.createElement("canvas");n.className=i,n.style.width="100%",n.style.height="100%";var r=document.getElementById(e).appendChild(n);null!=r&&pJSDom.push(new pJS(e,a))},window.particlesJS.load=function(e,a,t){var i=new XMLHttpRequest;i.open("GET",a),i.onreadystatechange=function(a){if(4==i.readyState)if(200==i.status){var s=JSON.parse(a.currentTarget.response);window.particlesJS(e,s),t&&t()}else console.log("Error pJS - XMLHttpRequest status: "+i.status),console.log("Error pJS - File config not found")},i.send()};
       var particles = {
      "particles": {
        "number": {
          "value": 160,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          },
          "polygon": {
            "nb_sides": 5
          },
          "image": {
            "src": "img/github.svg",
            "width": 100,
            "height": 100
          }
        },
        "opacity": {
          "value": 1,
          "random": true,
          "anim": {
            "enable": true,
            "speed": 1,
            "opacity_min": 0,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 4,
            "size_min": 0.3,
            "sync": false
          }
        },
        "line_linked": {
          "enable": false,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 0.17,
          "direction": "none",
          "random": true,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 600
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": false,
            "mode": "bubble"
          },
          "onclick": {
            "enable": false,
            "mode": "repulse"
          },
          "resize": false
        },
        "modes": {
          "grab": {
            "distance": 400,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 250,
            "size": 0,
            "duration": 2,
            "opacity": 0,
            "speed": 3
          },
          "repulse": {
            "distance": 400,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
   };
   particlesJS('particles-js', particles, function() {
     console.log('callback - particles.js config loaded');
   });
  </script>
</body>
</html>
<?php $process->end(); ?>