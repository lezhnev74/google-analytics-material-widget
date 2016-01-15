<?php

return [
    // Email of your service to work with Google Analytics API
    // Create service: https://console.developers.google.com/flows/enableapi?apiid=analytics&credential=client_key
    "SERVICE_EMAIL"  => "",
    "ACCESS_FILE"    => "",

    // your Google Analytics Tracking ID (of your website)
    "TRACKING_ID"    => "",

    // Period for stats show
    // 90 means show analytics for last 90 days
    "TRACKING_PERIOD_DAYS"           => 90,

    // color of the card
    // choose from http://materializecss.com/color.html
    // Example: "deep-orange darken-1"
    "material_color" => "amber darken-3",

];


/**
 * INSERT THIS CODE TO THE PLACE OF YOUR WEBPAGE WHERE YOU WANT TO SEE THE WIDGET:
 */
/*

<!-- GOOGLE ANALYTICS CARD WIDGET STARTS -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="<URL>/local/static/load.js"></script>
<iframe id="card-widget" src="<URL>/local/card1.php" seamless="seamless" scrolling="no" style="width:100%" frameBorder="0"></iframe>
<!-- GOOGLE ANALYTICS CARD WIDGET ENDS -->

 */