<?php
    require_once 'inc/includes.php';
    header('Content-Type: application/json');

    // Creates an Acronym for the short name
    $words = explode(" ", $data->b_name);
    $acronym = "";

    foreach ($words as $w) {
      $acronym .= $w[0];
    }
    $process->start();

    echo '{
        "short_name": "' . $acronym . '",
        "name": "' . $data->b_name . '",
        "icons": [
          {
           "src": "assets/images/favicons/android-icon-36x36.png",
           "sizes": "36x36",
           "type": "image\/png",
           "density": "0.75"
          },
          {
           "src": "assets/images/favicons/android-icon-48x48.png",
           "sizes": "48x48",
           "type": "image\/png",
           "density": "1.0"
          },
          {
           "src": "assets/images/favicons/android-icon-72x72.png",
           "sizes": "72x72",
           "type": "image\/png",
           "density": "1.5"
          },
          {
           "src": "assets/images/favicons/android-icon-96x96.png",
           "sizes": "96x96",
           "type": "image\/png",
           "density": "2.0"
          },
          {
           "src": "assets/images/favicons/android-icon-144x144.png",
           "sizes": "144x144",
           "type": "image\/png",
           "density": "3.0"
          },
          {
           "src": "assets/images/favicons/android-icon-192x192.png",
           "sizes": "192x192",
           "type": "image\/png",
           "density": "4.0"
          }
         ],
        "start_url": "' . $data->domain . '/?pwa=y",
        "background_color": "#' . $data->primary_colour . '",
        "display": "standalone",
        "scope": "' . $data->domain . '/?pwa=y",
        "theme_color": "#' . $data->primary_colour . '"
    }';
    $process->end();
?>