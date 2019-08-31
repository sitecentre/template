var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});

$('#book-online').on('shown.bs.modal', function () {
    $('#book-online').trigger('focus')
})

// form validation
function validateRegister() {
	var cfdsakjfsnm, phgfdsgfdgvjfdsh, gfdgfdsgfds;

	cfdsakjfsnm = $('#cfdsakjfsnm').val();
	phgfdsgfdgvjfdsh = $('#phgfdsgfdgvjfdsh').val();
	gfdgfdsgfds = $('#gfdgfdsgfds').val();

	if (cfdsakjfsnm == null || cfdsakjfsnm == '') {
    	$('#regisErr').addClass('error').text('* Please Enter your name');
    	$('#cfdsakjfsnm').focus();
    	return false;
	}
	if(cfdsakjfsnm.length < 1 ) {
    	$('#regisErr').addClass('error').text('* Name is too short');
    	$('#cfdsakjfsnm').focus();
    	return false;
	}
	if(phgfdsgfdgvjfdsh == null || phgfdsgfdgvjfdsh == '') {
    	$('#regisErr').addClass('error').text('* Please Enter a Phone Number!');
    	$('#phgfdsgfdgvjfdsh').focus();
    	return false;
	}
	if(phgfdsgfdgvjfdsh.length < 5 ) {
    	$('#regisErr').addClass('error').text('* Phone Number is too short!');
    	$('#phgfdsgfdgvjfdsh').focus();
    	return false;
	}
	if(gfdgfdsgfds == null || gfdgfdsgfds == '') {
    	$('#regisErr').addClass('error').text('* Please Enter a Message');
    	$('#gfdgfdsgfds').focus();
    	return false;
	}
	if(gfdgfdsgfds.length < 2 ) {
    	$('#regisErr').addClass('error').text('* Please Enter a Message!');
    	$('#gfdgfdsgfds').focus();
    	return false;
	}
}

// Testimonials Popup
$(document).ready(function(){
	// startign delay in miliseconds
	var start_delay_ms = 5000;
	// holding a notifications for a miliseconds
	var delay_ms = 10000;
	// wait before another popup shows
	var wait_ms = 20000;
	setTimeout(function(){
		$.ajax({
			url: 'data.json',
			dataType: "json",
			success: function(response){
				data = response;
				$.each(data, function(i, v) {
					if(i == 0){
						$('#alert-container').append('<a target="_blank" href="'+v.url+'" id="content-'+i+'" class="pop-body animated animatedFadeInUp fadeInUp"><span class="pop-name"><b>'+v.name+'</b> left a <b>5 star</b> review:</span>'+v.title+'<span class="pop-info">i</span></a>')
						setTimeout(function(){
							$('#content-'+i) .fadeOut(function(){
								$(this).remove();
							});
						}, delay_ms);
					} else {
						setTimeout(function(){
							$('#alert-container').append('<a target="_blank" href="'+v.url+'" id="content-'+i+'" class="pop-body animated animatedFadeInUp fadeInUp"><span class="pop-name"><b>'+v.name+'</b> left a <b>5 star</b> review:</span>'+v.title+'<span class="pop-info">i</span></a>')
							setTimeout(function(){
								$('#content-'+i) .fadeOut(function(){
									$(this).remove();
								})
							}, delay_ms)
						}, i * (wait_ms + delay_ms))
					}
				})
			}
		})
	}, start_delay_ms)
})
function delay(seconds) {}

// Disable right click
document.addEventListener('contextmenu', event => event.preventDefault());

// Disable Right click again + ctrl+u & ctrl+c
var isCtrl = false;
document.onkeyup = function(e) {
    if (e.which == 17)
        isCtrl = false;
}
document.onkeydown = function(e) {
    if (e.which == 17){
        isCtrl = true;
    }
    
    if ((e.which == 85) || (e.which == 67) && isCtrl == true) {
        return false;
    }
}
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if (navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

function mischandler() {
    return false;
}

function mousehandler(e) {
    var myevent = (isNS) ? e : event;
    var eventbutton = (isNS) ? myevent.which : myevent.button;
    if ((eventbutton == 2) || (eventbutton == 3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;


jQuery(document).ready(function($){
    $(document).keydown(function(event) { 
        var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
        
        if (event.ctrlKey && (pressedKey == "c" || pressedKey == "u" || pressedKey == "i" || pressedKey == "s")) {
            return false; 
        }
        
        if (event.altKey) {
            return false; 
        }
    });
});

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});

document.onkeypress = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        return false;
    }
}
document.onmousedown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        return false;
    }
}
document.onkeydown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        return false;
    }
}