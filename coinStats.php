<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Coin/Token Data</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="cssSearch/bootstrap.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="cssSearch/mdb.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }

        .extra-margins {
            margin-top: 1rem;
            margin-bottom: 2.5rem;
        }

        .jumbotron {
            text-align: center;
        }

        .navbar {
            background-color: #00cc00;
        }

        footer.page-footer {
            background-color: black;
            margin-top: 2rem;
        }
        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }
        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
    </style>

</head>

<body>


    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            </div>
        </nav>
        <!--/.Navbar-->

    </header>
<?php
    echo '<main>';

        //<!--Main layout-->
        echo '<div class="container">';
            //<!--First row-->
            echo '<div class="row wow fadeIn" data-wow-delay="0.2s">';
                echo '<div class="col-md-12">';
                    echo '<div class="jumbotron">';
                        echo '<h2 class="h2-responsive">COIN/TOKEN DATA</h2>';
                        echo '<br>';
                        echo '<p></p>';
                        echo '<hr>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            //<!--/.First row-->

            
                        // set HTTP header
                        $headers = array(
                            'Content-Type: application/json',
                        );

                        //the kind folks at coinmarket cap, remember <= 10 hits per/min
                        $url = 'https://api.coinmarketcap.com/v1/ticker/?limit=0';
                        
                        // Open connection
                        $ch = curl_init();
                        
                        // Set the url, number of GET vars, GET data
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        
                        // Execute request
                        $result = curl_exec($ch);
                        
                        // Close connection
                        
                        curl_close($ch);
                        
                        // get the result and parse to JSON
                        $result_arr = json_decode($result,1);
                        
                        /*
                        More precise stats if you are interested
                        $sevenDayPerformance = array();

                        foreach($result_arr as $data) {
                            $sevenDayPerformance[] = $data['percent_change_7d'];
                        }

                        var_dump(array_sum($sevenDayPerformance) / count($result_arr));

                        $twentyFourHourPerf = array();
                        

                        
                        $price = array();
                        foreach($result_arr as $data) {
                            $price[] = $data['price_usd'];
                        } 

                        $marketCap = array();
                        foreach ($result_arr as $data) {

                            $marketCap[] = $data['market_cap_usd'];                            
                        }

                        //var_dump(number_format(array_sum($marketCap)));//

                        
                            var_dump(intval($marketCap));
                        


                        //var_dump($price);
                        //var_dump(array_sum($price) / count($result_arr));
                        //var_dump(array_sum($price));
                        */

           echo '<hr class="extra-margins">';

            
            foreach ($result_arr as $data ) {
    if(gettype($data) == 'array') {

            
                //Second row
            echo '<div class="row">';
                //Second columnn
                echo '<div class="col-lg-4">';
                    //Card
                   echo '<div class="card wow fadeIn" data-wow-delay="0.4s">';

                        //Card image
                        

                        //Card content
                       echo '<div class="card-body">';
                            //Title
                           echo '<h4 class="card-title">' . $data['name'] . '</h4>';
                           echo '<h4 class="card-title">' . $data['symbol'] . '</h4>';
                            //Text
                           echo '<p class="card-text">' . '<b>' . 'PRICE-USD: ' . '</b>' . $data['price_usd'] . '</p>';
                           echo '<p class="card-text">' . '<b>' . '24 HOUR VOLUME-USD: ' . '</b>'. $data['24h_volume_usd'] . '</p>';
                           echo '<p class="card-text">' . '<b>' . 'MARKET CAP-USD: ' . '</b>'. $data['market_cap_usd'] . '</p>';
                           echo '<p class="card-text">' . '<b>' . 'AVAILABLE SUPPLY: ' . '</b>'. $data['available_supply'] . '</p>';
                           echo '<p class="card-text">' . '<b>' . 'TOTAL SUPPLY: ' . '</b>'. $data['total_supply'] . '</p>';
                           echo '<p class="card-text">' . '<b>' . 'MAX SUPPLY: ' . '</b>'. $data['max_supply'] . '</p>';
                           if($data['percent_change_1h'] > 0){
                                echo '<p class="card text-white bg-success mb-3">' . '<b>' . 'PERCENT CHANGE 1 HOUR: ' . '</b>'. $data['percent_change_1h'] . '</p>';
                           } else {
                                echo '<p class="card text-white bg-danger mb-3">' . '<b>' . 'PERCENT CHANGE 1 HOUR: ' . '</b>'. $data['percent_change_1h'] . '</p>';
                           }
                           if($data['percent_change_24h'] > 0){
                                echo '<p class="card text-white bg-success mb-3">' . '<b>' . 'PERCENT CHANGE 24 HOURS: ' . '</b>'. $data['percent_change_24h'] . '</p>';
                           } else {
                                echo '<p class="card text-white bg-danger mb-3">' . '<b>' . 'PERCENT CHANGE 24 HOURS: ' . '</b>'. $data['percent_change_24h'] . '</p>';                     
                           }

                           if($data['percent_change_7d'] > 0){
                                echo '<p class="card text-white bg-success mb-3">' . '<b>' . 'PERCENT CHANGE 7 DAYS: ' . '</b>'. $data['percent_change_7d'] . '</p>';
                           } else {
                                echo '<p class="card text-white bg-danger mb-3">' . '<b>' . 'PERCENT CHANGE 7 DAYS: ' . '</b>'. $data['percent_change_7d'] . '</p>';
                           }


                        echo '</div>';

                    echo '</div>';
                    //Card

               echo '</div>';

            echo '</div>'; //end php here

    } 
    
} 

            //<!--/.Second row-->
        echo '</div>'; 
        //<!--/.Main layout-->

    echo '</main>'; ?>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer links-->
        <div class="container-fluid">
            <div class="row">
                <!--First column-->
                <div class="col-lg-3 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong></strong></h5>
                    <p></p>
                    <p></p>
                </div>
                <!--/.First column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Second column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>#</strong></h5>
                    <ul>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                    </ul>
                </div>
                <!--/.Second column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Third column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>#</strong></h5>
                    <ul>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                    </ul>
                </div>
                <!--/.Third column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Fourth column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>#</strong></h5>
                    <ul>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                        <li>
                            <a href="#!">#</a>
                        </li>
                    </ul>
                </div>
                <!--/.Fourth column-->
            </div>
        </div>
        <!--/.Footer links-->

        <hr>

        <!--Call to action-->
        <!--<div class="call-to-action">
            <h4 class="mb-5">Material Design for Bootstrap</h4>
            <ul>
                <li>
                    <h5>Get our UI KIT for free</h5>
                </li>
                <li><a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-primary" rel="nofollow">Sign up!</a></li>
                <li><a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-default" rel="nofollow">Learn more</a></li>
            </ul>
        </div>-->
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © </a>
            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="jsSearch/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="jsSearch/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="jsSearch/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="jsSearch/mdb.min.js"></script>

    <script>
        new WOW().init(); //this creates the delay effect, if it annoys you remove this line
    </script>

</body>

</html>
