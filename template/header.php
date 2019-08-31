<section id="notice" class="mobile-hide tablet-hide">
    <div class="container">
        <div class="row font-weight-bold py-3">
            <div class="col-6 text-center text-md-left star-rating text-uppercase">
                <i class="star"></i>
                {{review_rated}} Star Service ({{review_total}} Reviews)
            </div>
            <div class="col-6 text-center text-md-right">
                <i class="i-clock"></i> Monday - Sunday: 7am - 5pm
            </div>
        </div>
    </div>
</section>

<header class="sticky-top">
    <nav class="navbar sticky-top navbar-light navbar-expand-xl header">
        <div class="container">
            <a class="navbar-brand mr-3" href="{{domain}}/"><img src="{{cdn}}/assets/images/logo.svg" height="80" width="143" class="logo img-fluid" alt="{{info:name}} Logo"></a>

            <div class="d-flex justify-content-center justify-content-md-end">
                <a href="tel:{{info:phone}}" class="btn d-lg-none mr-3" onClick="gtag('event','click',{'name':'Mobile Call','event_category':'Call','event_label':'Mobile Header'});"><i class="i-phone"></i> Call</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto font-weight-bold text-uppercase">
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Our Suburbs" href="{{domain}}/suburbs">Suburbs</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Our Services" href="{{domain}}/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Pests we Manage" href="{{domain}}/pests">Pests</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Residential {{info:industry}}" href="{{domain}}/residential">Residential</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Commerical {{info:industry}}" href="{{domain}}/commercial">Commercial</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-4" title="Frequently Asked Questions" href="{{domain}}/faq">FAQ</a></li>
                </ul>

                <a href="tel:{{info:phone}}" class="btn cta" onClick="gtag('event','click',{'name':'Call','event_category':'Call','event_label':'Header'});">
                    <i class="i-phone"></i> {{info:phone}}
                </a>
            </div>
        </div>
    </nav>
</header>

