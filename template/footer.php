<section id="areas-served">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4 col-sm-12 py-5 text-md-left text-center">
                <h4 class="py-md-3">Areas Served</h4>
            </div>
            <div class="col-md-8 col-sm-12 pb-md-0 pb-5 text-md-right text-center">
                <div class="d-flex flex-row font-weight-bold flex-row-reverse">
                    <div class="p-md-2 mr-0 location"><i class="location-icon"></i> Sunshine Coast</div>
                    <div class="p-md-2 location"><i class="location-icon"></i> Noosa</div>
                    <div class="p-md-2 location"><i class="location-icon"></i> North Brisbane</div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container py-5">
        <div class="row text-center text-md-left">
            <div class="col-xl-3 col-md-6">
                <h4 class="text-uppercase under pb-4">Helpful Links</h4>
                <ul>
                    <li><a href="{{domain}}/services" title="Our Services">Our Services</a></li>
                    <li><a href="{{domain}}/suburbs" title="Our Suburbs">Our Suburbs</a></li>
                    <li><a href="{{domain}}/pests" title="Pests we Manage">Pests</a></li>
                    <li><a href="{{domain}}/residential" title="Residential {{info:industry}}">Residential</a></li>
                    <li><a href="{{domain}}/commercial" title="Commerical {{info:industry}}">Commercial</a></li>
                    <li><a href="{{domain}}/faq" title="Frequently Asked Questions">FAQ</a></li>
                    <li><a href="{{domain}}/about-us" title="About Us">About Us</a></li>
                    <li><a href="{{domain}}/contact-us" title="Contact Us">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6">
                <h4 class="text-uppercase under pb-4">Our Locations</h4>
                <ul>
                    <li><a href="{{domain}}/suburbs/aura" title="Aura {{info:industry}}">Aura</a></li>
                    <li><a href="{{domain}}/suburbs/bribie-island" title="Bribie Island {{info:industry}}">Bribie Island</a></li>
                    <li><a href="{{domain}}/suburbs/caloundra" title="Caloundra {{info:industry}}">Caloundra</a></li>
                    <li><a href="{{domain}}/suburbs/kawana-waters" title="Kawana {{info:industry}}">Kawana</a></li>
                    <li><a href="{{domain}}/suburbs/maroochydore" title="Maroochydore {{info:industry}}">Maroochydore</a></li>
                    <li><a href="{{domain}}/suburbs/mooloolaba" title="Mooloolaba {{info:industry}}">Mooloolaba</a></li>
                    <li><a href="{{domain}}/suburbs/noosa" title="Noosa {{info:industry}}">Noosa</a></li>
                    <li><a href="{{domain}}/suburbs/sunshine-coast" title="Sunshine Coast {{info:industry}}">Sunshine Coast</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6">
                <h4 class="text-uppercase under pb-4">Contact</h4>
                <ul>
                    <li><i class="i-marker"></i><a href="#" title="">{{info:street}}, {{info:suburb}} {{info:postcode}}</a></li>
                    <li><i class="i-phone"></i><a href="tel:{{info:phone}}" title="Call Us Today" onClick="gtag('event','click',{'name':'Call','event_category':'Call','event_label':'Footer'});">{{info:phone}}</a></li>
                    <li><i class="i-email"></i><a href="mailto:{{info:email}}" title="Email Us" onClick="gtag('event','click',{'name':'Email Click','event_category':'Email','event_label':'Footer'});">{{info:email}}</a></li>
                    <li><i class="i-clock"></i>Mon-Sun: 7am - 5pm</li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6">
                <iframe sandbox="allow-same-origin allow-scripts" class="lazy" scrolling="no" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7139.839768074924!2d153.060337!3d-26.522701!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb686d5ba5ac71ab1!2sDiggerman+Training!5e0!3m2!1sen!2sau!4v1557976439603!5m2!1sen!2sau" width="267" height="267" frameborder="0" title="{{info:name}} Localation" aria-label="{{info:name}} Localation" allowfullscreen></iframe>
            </div>
        </div>
    </div>

	<div class="text-center signoff py-4">
	    <a href="{{domain}}/terms-of-use" title="{{info:name}} Terms of Use">Terms of Use</a> - <a href="{{domain}}/privacy-policy" title="{{info:name}} Privacy Policy">Privacy Policy</a> - <a href="{{domain}}/sitemap" title="{{info:name}} Sitemap">Sitemap</a><br>
	    <?php echo 'Copyright &copy; {{info:started}}-' . date("Y") . ' {{info:name}} - ABN: <a href="https://abr.business.gov.au/ABN/View?id={{info:abn}}" rel="nofollow noreferrer noopener" target="_blank" title="{{info:name}} ABN">{{info:abn}}</a>. All rights reserved.'; ?><br>
	    Made with <span style="color:#FF0066">&hearts;</span> in Australia<br>
	    Website &amp; Marketing by sitecentre
	</div>
</footer>

<!-- Testimonial Alert -->
<div id="alert-container"></div>

<!-- Modal -->
<div class="modal fade" id="book-online" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="enquiry-form" name="contactform" method="post" action="./thank-you" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title">Enquire Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input autocomplete="false" aria-label="Autocomplete turned off" title="Autocomplete turned off" hidden />
                    <input type="text" name="website" aria-label="Website" title="Website" hidden />
                    <input type="text" name="page" value="{{domain}}/{{slug}}" aria-label="Page" title="Page" hidden />
                    <input type="text" class="my-2" id="cfdsakjfsnm" name="cfdsakjfsnm" placeholder="Full name..." aria-label="Full name" title="Full name" required="" pattern=".{2,}" minlength="2" autocomplete="off" />
                    <input type="phone" class="my-2" id="phgfdsgfdgvjfdsh" name="phgfdsgfdgvjfdsh" placeholder="Phone number..." aria-label="Phone number" title="Phone number" required="" pattern=".{5,}" minlength="5" autocomplete="off" />
                    <textarea name="gfdgfdsgfds" class="my-2" id="gfdgfdsgfds" placeholder="Message..." aria-label="Message" title="Message" required="" maxlength="500" pattern=".{0,500}"></textarea>

                    <div class="errorBlock">
                        <span id="regisErr"></span>
                    </div>
                </div>

                <div class="modal-footer text-center d-block">
                    <button type="submit" class="btn cta" onclick="return validateRegister();">Send Enquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>