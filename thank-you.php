<?php
	require_once 'inc/includes.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $fullname = $phone = $message = $page = $website = $_msg = $cloudflare_IP = $spam_filter = $found_error = $spam_words = $mail = $timenow = $ip_address = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	if(isset($_POST['phgfdsgfdgvjfdsh'])) {
    	    // Only give access to PHPMailer if the form has at least been submitted.
            require 'inc/PHPMailer/Exception.php';
            require 'inc/PHPMailer/PHPMailer.php';

            // get the users IP address
        	$ip_address = getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');

        	/* -------------------------------------
        	    DATA VALIDATION
        	------------------------------------- */

        	// Filter the inputted values to ensure no one is spamming
            $fullname = _validation($_POST['cfdsakjfsnm']);
        	$phone = _validation($_POST['phgfdsgfdgvjfdsh']);
        	$message = _validation($_POST['gfdgfdsgfds']);

        	// Validate that the phone number is only numbers and spaces
        	if(!preg_match('/^[0-9 +-]*$/', $phone)){
        	    $found_error = "yes";
        	    $spam_filter = 'Phone contains spam characters.';
        	    $_msg = 'Whoops, something went wrong. The phone number provided might not be valid, please try again or call.';
        	}

        	// Validate that data exists in both name and phone boxes.
        	if(!isset($_POST['cfdsakjfsnm']) || !isset($_POST['phgfdsgfdgvjfdsh'])) {
                $found_error = "yes";
                $spam_filter = 'Phone or Name not entered';
                $_msg = 'Whoops, something went wrong. Maybe It\'s worth giving us a call instead.';
        	}

        	/* -------------------------------------
        	    END DATA VALIDATION
        	------------------------------------- */




        	/* -------------------------------------
        	    SPAM FILTERING
        	------------------------------------- */

        	// We're going to detect the users location data to only allow AU, NZ. We will also pull location here to use in the email.
            $cloudflare_IP = $_SERVER["HTTP_CF_CONNECTING_IP"];

        	// This checks to see if the hidden website field has been filled out of not. - If yes, most likely a spamming bot.
        	if($_POST['website'] !== ''){
                $_msg = 'Whoops, something went wrong. It looks like you might have entered something that shouldn\'t have been. Please go back, and try again.';
                $spam_filter = 'Website Field';
                $found_error = "yes";
            }

            // This script is designed to detect scam, spam, and unsolicited form submissions. 
            $spam_words = array('sex', 'sexy', 'seo', 'fuck', 'horny', 'porn', 'porno',  'webcam', 'invest', 'bitcoin');

            if(in_array(strtolower($message), $spam_words) ) {
                $found_error = "yes";
                $spam_filter = 'Unsafe Word';
                $_msg = 'Whoops, something went wrong. It looks like you might have used a word within the message that we do not allow. Please try again.';
            }

            /* -------------------------------------
        	    END SPAM FILTERING
        	------------------------------------- */


        	// Checks if the validation and the spam filtering has detected any errors, if it does. Submit the error to the spam database for recording purposes.
        	if($found_error == 'yes'){
        	    // Found dodgy email.
        	} else {
        	    $timenow = date("d/m/Y h:i:s a");
            	$mail = new PHPMailer(true);                                // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->From = $data->b_email;
                    $mail->FromName = $data->b_name;

                    //Recipients
                    $mail->setFrom($data->b_email, $data->b_name);

                    $mail->addAddress($data->b_email);           // Add a recipient

                    $mail->isHTML(true);
                    $mail->Subject = 'New Enquiry from ' . $fullname . '';
                    $mail->Body = '
                        <h2>' . $data->b_name . ' has a new enquiry:</h2>
                        <b>Name:</b> ' . clean_string($fullname) . '<br>
                        <b>Phone:</b> ' . clean_string($phone) . '<br>
                        <b>Message:</b> ' . clean_string($message) . '<br><br>

                        <b>Enquiry Page</b> ' . $_POST['page'] . '<br>
                        <b>Time:</b> ' . $timenow . '<br>
                        <b>IP Address:</b> ' . $ip_address . '<br>
                        <br><b><em>Kind Regards,<br>' . $data->b_name . '</em></b>
                    ';
                    $mail->AltBody = 'Please Enable HTML emails.';

                    $mail->send();
                } catch (Exception $e) {

                }
        	}
        }
    } else {
        $found_error = "yes";
        $_msg = 'Whoops, You shouldn\'t be here.';
    }
	$process->start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Thank you for Contacting us: {{info:name}}</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex" />

    <!-- Include Meta Tags -->
	<?php $template->meta(); ?>
	<?php
    	if ($_msg == ''){
            echo '
                <script>
                    gtag(\'event\', \'enquiry\', {
                        \'event_category\': \'Enquiry\',
                        \'event_label\': \'Thank You Form\'
                    });
            	</script>
            ';
        } else { }
	?>
</head>
<body>
	<?php $template->menu(); ?>

	<!-- Main website html here -->
	<section id="page-header">
	    <div class="container">
	        <div class="row d-flex align-items-center">
	            <div class="col-12 col-md-9 py-5">
	                <h1 class="ml-3 text-uppercase font-weight-bolder"><span>Thank You</span></h1>
	                <p class="ml-3"><span>Thank you for contacting {{info:name}} we will be with you shortly</span></p>
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
    	            <?php
    	                if ($_msg == ''){
    	                    echo '<h2 class="pb-3">Thank you ' . $fullname . ',</h2>';
    	                    echo '<p>Thank you for contacting {{info:name}}, we will be with you shortly. If you cannot wait, or the job is urgent. Please contact us on <a href="tel:{{info:phone}}" onClick="gtag(\'event\',\'click\',{\'name\':\'Thank You Call\',\'event_category\':\'Call\',\'event_label\':\'Thank You\'});">{{info:phone}}</a>.</p>';
    	                    echo '<p><em><b>Kind Regards, <br>{{info:name}}</b></em></p>';
    	                } else {
    	                    echo '<p>' . $_msg . '</p>';
    	                }
					?>
    	        </div>
        	</div>
	    </div>
	</section>

    <?php $template->footer(); ?>
	<?php $template->javascript(); ?>
</body>
</html>
<?php $process->end(); ?>