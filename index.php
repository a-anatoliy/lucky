<!DOCTYPE html>
<html lang="en">
<?php
session_start();
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
$logFile = ROOT_DIR."/data/hitcount.txt";
$cfg = require 'data/cfg/config.php';
$langPack = require 'data/cfg/lang.php';
$lang='pl';
$langPack=$langPack[$lang];

require 'bin/hit_counter.php';
$hit_obj = new BT_HitCounter();
$hit_obj->unique_visits = true;
$hit_obj->hit_count_file = $logFile;

if(!isset($_SESSION["counted"])){
    $hit_obj->recordHit();
    $_SESSION["counted"]=1;
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$langPack['descr']?>">
    <meta name="keywords" content="<?=$langPack['keywrds']?>">
    <meta name="author" content="">

    <title>Lucky DRESS</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/css/grayscale.css" rel="stylesheet">
    <link href="/css/contact.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- ANN Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '543861295961754');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=543861295961754&ev=PageView&noscript=1"
    /></noscript>
<!-- ANN End Facebook Pixel Code -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- fb init start -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=453526095028535';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<!-- fb init stop -->
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Lucky DRESS <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>
                    <span class="light">Lucky</span> DRESS
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a class="page-scroll" href="#about">About</a></li>
                    <li><a class="page-scroll" href="#contact">Contact</a></li>
                    <li><a class="page-scroll" href="/media_one.php">Gallery</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="brand-heading">
                            <?=$langPack['header']?>
                        </h2>
                        <p class="intro-text">
                            <?=$langPack['slogan']?>
                        </p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="text-center">About</h2>
                <p><?=$langPack['about']?></p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-12 text-center">
                    <h4 class="contact-header"><?=$langPack['contact']?></h4>
                    <div class="contact-header-small"><?=$langPack['arrange']?></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form role="form" id="contactForm" data-toggle="validator" class="shake">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="<?=$langPack['name']?> *" required="required" autofocus="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email *" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                        <input type="phone" class="form-control" name="phone" id="phone" placeholder="<?=$langPack['phoneNumb']?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="6" cols="25" required="required" placeholder="<?=$langPack['message']?> *"></textarea>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-12">
                                    <button type="submit" id="form-submit" class="btn btn-primary pull-right contact-button"><?=$langPack['act']?>
                                        <span class="glyphicon glyphicon-send"></span>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <legend><span class="glyphicon glyphicon-globe"></span> Address</legend>
                    <address>
                        Długa 17, 31-147 <strong>Kraków</strong><br>Pasaż Wenecki, «Szczęśliwa sukienka»<br>
                        <abbr title="Phone">Phone no.:</abbr> (+48) 794 64 64 62
                    </address>
                    <address>Email: <a href="mailto:apanolga@gmail.com">info@lucky-dress.eu</a></address>
                    <div><strong>Godziny otwarcia:</strong>
                        <br>pon. – pt. 10:00 – 18:00
                        <br>sob. 10:00 – 14:00
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->

 <script>
    function initMap() {
            // var napiaski = {lat: 50.104911, lng:19.923992};
            var dluga = {lat:50.068248, lng:19.938644};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: dluga
            });
            var marker = new google.maps.Marker({
              position: dluga,
              // position: napiaski,
              // icon: {
              //     path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
              //     scale: 10,
              // },
              animation: google.maps.Animation.DROP,
              title: "Yukai",
              map: map
            });
    }
    function toggleBounce() {
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDQKdquc3DvxXQU51TLOxn-9hv5hKoa64&callback=initMap&clickableIcons=false"
    async defer></script>


    <!-- <div id="map" style="position: relative; top: -248px;margin-bottom: -240px !important"></div> -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
        	<p><div class="fb-like" data-href="https://www.facebook.com/luckydresskrakow/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></p>
            <p>Copyright &copy; Yukai 2018</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="/js/grayscale.min.js"></script>

    <!-- Plugin JavaScript -->

    <script type="text/javascript" src="/js/validator.min.js"></script>
    <script type="text/javascript" src="/js/form-scripts.js"></script>
</body>
</html>
