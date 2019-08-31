    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />

    <!-- Author sitecentre, designer, Website main colour -->
    <meta name="author" content="sitecentre">
    <meta name="theme-color" content="#{{info:primary_colour}}"/>

    <!-- Base URL should be final URL -->
    <base href="{{domain}}/" />
    <link rel="canonical" href="{{domain}}/{{slug}}">

    <!-- Google and Bing Verification -->
    <meta name="google-site-verification" content="{{info:gsc}}" />
    <meta name="msvalidate.01" content="{{info:bsc}}" />

    <link rel="preconnect" href="{{domain}}" crossorigin="crossorigin">
    <link rel="preconnect" href="https://ik.imagekit.io" crossorigin="crossorigin">

    <link rel="dns-prefetch" href="{{domain}}">
    <link rel="dns-prefetch" href="https://ik.imagekit.io">

    <link rel="stylesheet" type="text/css" href="{{cdn}}/assets/css/main.css" />

    <!-- Fav icons and Manifest -->
    <link rel="shortcut icon" type="image/x-icon" href="{{cdn}}/favicon.ico">
    <link rel="apple-touch-icon" href="{{cdn}}/assets/images/favicons/apple-icon-180x180.png">
    <link rel="manifest" href="{{cdn}}/manifest.json">

    <!-- Google Analytics Code -->
    <script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id={{info:ga}}"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{info:ga}}');
    </script>