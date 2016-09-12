<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <!-- declare all page rendering and programmatic related tags -->
    <meta charset="utf-8">

    <!-- Care about IE? -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- title tag is MANDATORY -->
    <title>Video Player</title>

    <!-- declare Viewport for Mobile Devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- META DATA (KEYWORD META TAG IS DEPRECIATED)-->
    <meta name="description" content="">
    <meta name="author" content="Federico Venturino">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- jQuery UI stylesheet  -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">

    <!-- WebHostingHub Glyphs -->
    <link rel="stylesheet" href="css/whhg.min.css">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>

    <!-- DEVELOPMENT STYLES COMPILED FROM LESS SOURCE FILES USING NODE.JS / OVERRIDES BOOTSTRAP DEFAULTS -->
    <link rel="stylesheet" href="css/custom.min.css">

</head>
<body>

    <div class="main-container" role="main">

        <header> 
            <h4><a href="../library_.php" style="color:#FFF">Home</a> - <a href="#"  style="color:#FFF">Video Player</a></h4>
        </header>

        <section id="video-section">
            <h2 class="hidden">Video Section</h2>

            <div id="media-player">

                <video id="videoPlayer" preload="none" poster="img/cover.jpg" controls>
                    <source src="<?php echo $_GET['url']; ?>" type="video/mp4" />
                    <!--http://127.0.0.1:5984/resources/013a378e52ae3946e600cbd6bffaffa2/013a378e52ae3946e600cbd6bffaffa2.mp4-->
                   <!-- <source src="http://mirrorblender.top-ix.org/peach/bigbuckbunny_movies/big_buck_bunny_480p_stereo.ogg" type="video/ogg" />-->
                    Your browser does not support the video element.
                </video>

                <div class="media-controls">

                    <div id="playControls">
                        <button type="button" name='Play' class="btn glyphicon glyphicon-play" id="play_btn"></button>
                        <button type="button" name='Stop' class="btn glyphicon glyphicon-stop" id="stop_btn"></button>
                    </div>

                    <div id="progressContainer">
                         <span id='progress-bar' class="progress-bar" role="progressbar" aria-valuenow="0"  aria-valuemin="0" aria-valuemax="100"></span>
                    </div>

                    <div id="timeContainer">
                        <span id='currentTime'>00:00</span>
                    </div>

                    <div id="volumeControls">
                        <!--<span class="tooltip"></span>-->
                        <div id="sliderContainer"><div id="slider"></div></div>
                        <!--<span class="volume"></span>-->
                        <button id='volumeInc_btn' name='Volume' class="btn icon-volume-up"></button>
                        <button id='replay_btn' name='Replay' class="btn glyphicon glyphicon-repeat"></button>

                    </div>

                </div>

            </div>

        

        </section>

        <footer>
            <p></p>
		</footer>

    </div>

    <!-- jQuery -->
  	<script src="js/jquery.min.js"></script>

    <!-- jQuery UI (for sliders)  -->
    <script src="js/jquery-ui.min.js"></script>

    <!-- Other helper JS frameworks -->
    <script src="js/modernizr.min.js"></script>

  	<!-- Bootstrap Core JavaScript -->
  	<script src="js/bootstrap.min.js"></script>

  	<!-- Custom Javascript -->
  	<script src="js/script.min.js"></script>

    </body>
</html>
