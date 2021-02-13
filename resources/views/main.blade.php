<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Tour App</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:light,regular,medium,thin,italic,mediumitalic,bold" rel="stylesheet" type="text/css">

    <!--Styles-->
    <link id="app-style" rel="stylesheet" type="text/css" href="public/css/style.css">
    <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="public/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--JS Libraries-->
    <script type="text/javascript" src="public/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
    <script type="text/javascript" src="public/bower_components/moment/min/moment.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <nav id="top-nav" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <h4>Red Travel Guide v1.0</h4>
            </div>
        </nav>
        <div class="content-padding">
            <div class="hero-content">
                <div class="container">
                    <h4 class="text-center">Experience Japan!</h4>
                    <p class="text-center">Look for the best places to eat,shop,hangout and stay<br>without worrying about the weather here in the land of the rising sun.</p>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <select class="city-selector form-control">
                                <option value="">Select a City ...</option>
                                <option value="1">Tokyo</option>
                                <option value="2">Yokohama</option>
                                <option value="3">Kyoto</option>
                                <option value="4">Osaka</option>
                                <option value="3">Sapporo</option>
                                <option value="5">Nagoya</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="btn-group text-center">
                            <button type="button" class="btn btn-venue-category" data-category="4d4b7105d754a06374d81259" disabled>Food</button>
                            <button type="button" class="btn btn-venue-category" data-category="4d4b7104d754a06370d81259" disabled>Entertainment</button>
                            <button type="button" class="btn btn-venue-category" data-category="4d4b7105d754a06373d81259" disabled>Event</button>
                            <button type="button" class="btn btn-venue-category" data-category="4bf58dd8d48988d1fa931735" disabled>Accomodation</button>
                        </div>
                    </div>
                    <br>    
                </div>
            </div>
            <br>
            <div class="container">
                <div id="main-page">
                    <div class="row">
                        <div class="panel-weather hide">
                            <h4 class="text-center">Today's Weather</h4>
                            <hr>
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">
                                        <h4 class="city-name"></h4>
                                        <p class="city-degrees"></p>
                                        <p class="city-condition"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-venue"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.openwApiKey = "{{env('OPEN_WEATHER_KEY')}}";
        window.fCID = "{{env('FOURS_CLIENT_ID')}}";
        window.fCSecret = "{{env('FOURS_CLIENT_SECRET')}}";
    </script>
</body>

</html>