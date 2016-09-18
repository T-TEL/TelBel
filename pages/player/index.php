<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Video Player</title>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/video-default.css" rel="stylesheet">
        <style>
            body{padding-top: 10px}
        </style>
    </head>
    <body>
        <div class="container">
          <div class="row">
            <div class="span12">
                <h2>&nbsp;</h2>
                    <div class="videoUiWrapper thumbnail">
                        <video width="800" height="400"  id="masterplayer">
                           <!-- <source src="http://ia700305.us.archive.org/18/items/CopyingIsNotTheft/CINT_Nik_H264_720.ogv" type="video/ogg"> -->
                            <source src="<?php echo $_GET['url']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <h2>&nbsp;</h2>
              </div>
          </div>
        </div>
        <script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.video-ui.js"></script>
        <script type="text/javascript" >
            $('#masterplayer').videoUI();
        </script>
    </body>
</html>
