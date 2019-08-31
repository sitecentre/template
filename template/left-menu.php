<div class="d-flex justify-content-center d-md-none">
    <button class="btn yellow" type="button" data-toggle="collapse" data-target="#subMenu" aria-expanded="false" aria-controls="subMenu">Menu</button>
</div>
<div class="left-menu collapse d-md-block" id="subMenu">
    <ul>
        <li><a href="{{domain}}/services" title="Our Services" class="parent py-2 my-2">Our Services <a href="#dropServices" data-toggle="collapse" aria-expanded="<?php if (strpos($slug, 'services') !== false) { echo 'true'; } else { echo 'false'; }; ?>" class="dropdown-toggle"></a></a>
            <ul class="collapse list-unstyled dropped<?php if (strpos($slug, 'services') !== false) { echo ' show'; }; ?>" id="dropServices">
                <?php
                    $menuServices = $db->query("
            			SELECT slug,
            			name
            			FROM rh_services
            			WHERE status = '1'
            			AND menu = '1'
            			AND parent = '1'
            			ORDER BY menu_order ASC
            		");
            		while ($menuService = $menuServices->fetch_object()) {
            		    echo '<li><a href="{{domain}}/' . $menuService->slug . '" title="' . $menuService->name . '" class="py-2">- ' . $menuService->name . '</a></li>';
            		}
            	?>
            </ul>
        </li>
        <li><a href="{{domain}}/suburbs" title="Our Suburbs" class="parent py-2 my-2">Our Suburbs <a href="#dropSuburbs" data-toggle="collapse" aria-expanded="<?php if (strpos($slug, 'suburbs') !== false) { echo 'true'; } else { echo 'false'; }; ?>" class="dropdown-toggle collapsed"></a></a>
            <ul class="collapse list-unstyled dropped<?php if (strpos($slug, 'suburbs') !== false) { echo ' show'; }; ?>" id="dropSuburbs">
                <?php
                    $menuSuburbs = $db->query("
            			SELECT slug,
            			suburb_name
            			FROM rh_suburbs
            			WHERE status = '1'
            			AND menu = '1'
            		");
            		while ($menuSuburb = $menuSuburbs->fetch_object()) {
            		    echo '<li><a href="{{domain}}/' . $menuSuburb->slug . '" title="' . $menuSuburb->suburb_name . '" class="py-2">- ' . $menuSuburb->suburb_name . '</a></li>';
            		}
            	?>
            </ul>
        </li>
        <li><a href="{{domain}}/residential" title="Residential Pest Control" class="parent py-2 my-2">Residential <a href="#dropResidential" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"></a></a>
            <ul class="collapse list-unstyled dropped" id="dropResidential">
                <li><a href="{{domain}}/services/pest-treatments" title="General Pest Treatments" class="py-2">- General Pest Treatments</a></li>
                <li><a href="{{domain}}/services/end-of-lease-rental" title="End of Lease & Rental" class="py-2">- End of Lease & Rental</a></li>
                <li><a href="{{domain}}/services/building-and-pest-inspections" title="Building & Pest Inspections" class="py-2">- Building Inspections</a></li>
                
            </ul>
        </li>
        <li><a href="{{domain}}/commercial" title="Commercial Pest Control" class="parent py-2 my-2">Commercial <a href="#dropCommercial" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"></a></a>
            <ul class="collapse list-unstyled dropped" id="dropCommercial">
                <li><a href="{{domain}}/services/restaurants" title="Restaurant Pest Control" class="py-2">- Restaurants</a></li>
                <li><a href="{{domain}}/services/offices" title="Office Pest Control" class="py-2">- Offices</a></li>
                <li><a href="{{domain}}/services/nursing-homes" title="Nursing Home Pest Inspections" class="py-2">- Nursing Homes</a></li>
                <li><a href="{{domain}}/services/hotels-and-motels" title="Hotels & Motel Pest Control" class="py-2">- Hotels & Motels</a></li>
                <li><a href="{{domain}}/services/food-processing" title="Food Processing Pest Control" class="py-2">- Food Processing</a></li>
                <li><a href="{{domain}}/services/schools" title="School Pest Control" class="py-2">- Schools</a></li>
                <li><a href="{{domain}}/services/warehouses" title="Warehouse Pest Control" class="py-2">- Warehouses</a></li>
            </ul>
        </li>
        <li><a href="{{domain}}/pests" title="Pests we work with" class="parent py-2 my-2">Pests <a href="#dropPests" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"></a></a>
            <ul class="collapse list-unstyled dropped" id="dropPests">
                <li><a href="{{domain}}/fleas" title="Flea Information" class="py-2">- Fleas</a></li>
                <li><a href="{{domain}}/rodents" title="Rodent Information" class="py-2">- Rodents</a></li>
                <li><a href="{{domain}}/millipedes" title="Millipede Information" class="py-2">- Millipedes</a></li>
                <li><a href="{{domain}}/cockroaches" title="Cockroache Information" class="py-2">- Cockroaches</a></li>
                <li><a href="{{domain}}/slaters" title="Slater Information" class="py-2">- Slaters</a></li>
                <li><a href="{{domain}}/possums" title="Possum Information" class="py-2">- Possums</a></li>
                <li><a href="{{domain}}/wasps" title="Wasp Information" class="py-2">- Wasps</a></li>
                <li><a href="{{domain}}/bedbugs" title="Bedbug Information" class="py-2">- Bedbugs</a></li>
                <li><a href="{{domain}}/ants" title="Ant Information" class="py-2">- Ants</a></li>
                <li><a href="{{domain}}/crickets" title="Cricket Information" class="py-2">- Crickets</a></li>
                <li><a href="{{domain}}/spiders" title="Spider Information" class="py-2">- Spiders</a></li>
                <li><a href="{{domain}}/weevils" title="Weevils Information" class="py-2">- Weevils</a></li>
                <li><a href="{{domain}}/silverfish" title="Silverfish Information" class="py-2">- Silverfish</a></li>
            </ul>
        </li>
        <li><a href="{{domain}}/faq" title="Frequently Asked Questions" class="parent py-2 my-2">FAQ</a></li>
        <li><a href="{{domain}}/about-us" title="About Us" class="parent py-2 my-2">About Us</a></li>
        <li><a href="{{domain}}/contact-us" title="Contact Us" class="parent py-2 my-2">Contact Us</a></li>
    </ul>

    <ul class="mt-4">
        <li><a href="tel:{{info:phone}}" class="parent page-call mt-2 py-3 font-weight-bold" onClick="gtag('event','click',{'name':'Side Menu Call','event_category':'Call','event_label':'Side Menu'});">{{info:phone}}</a></li>
    </ul>

    <div class="left-offer mt-4">
        <div class="p-3">
            <h4 class="font-uppercase">30% Off Discount</h4>
            <p>Limited Time only offer, 30% OFF all pest control services with online enquiries.</p>
            <ul>
                <li><a href="#" class="parent page-book py-3 font-weight-bold text-uppercase" data-toggle="modal" data-target="#book-online" onClick="gtag('event','click',{'name':'Side Menu Book','event_category':'Book','event_label':'Side Menu'});">Book Online</a></li>
            </ul>
        </div>
    </div>
</div>