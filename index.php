<!DOCTYPE html>
<html lang="en">
<?php
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
$cfg = require 'data/cfg/config.php';
$langPack = require 'data/cfg/lang.php';
$lang='pl';
$langPack=$langPack[$lang];
session_start();

  //Если форма отправлена
  if(isset($_POST['submit'])) {
    if(trim($_POST['name']) == '') { $hasError = true;  } else { $username = trim($_POST['name']); }
    if(trim($_POST['phone']) == '') { $hasError = true; } else { $usertel  = trim($_POST['phone']); }
    if(trim($_POST['email']) == '')  { $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) { $hasError = true;
    } else { $usermail = trim($_POST['email']); }
    if(trim($_POST['message']) == '') { $hasError = true;
    } else { if(function_exists('stripslashes')) { $comments = stripslashes(trim($_POST['message'])); } else { $comments = trim($_POST['message']); } }

    if(!isset($hasError)) {
      $sendto   = $cfg['form']['to'];

      // creating headers
      $subject  = $cfg['form']['subject'];
      $headers  = "From: "    . strip_tags($usermail) . "\r\n";
      $headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

      // creating the message body
      $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
      $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
      $msg .= "<p><strong>От:</strong> ".$username."</p>\r\n";
      $msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
      $msg .= "<p><strong>Phone number:</strong> ".$usertel."</p>\r\n\n";
      $msg .= "<pre>".$comments."</pre>";
      $msg .= "</body></html>";

      // sending the message
      if(@mail($sendto, $subject, $msg, $headers)) { // nop
      } else { echo "<h3>Has NOT been sent</h3>"; }
      $emailSent = true;
    } else {
      echo "<h3>Has NOT been sent</h3>";
    }
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

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1640461006014568');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1640461006014568&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
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
                    <li><a class="page-scroll" href="/media_one.php">gallery</a></li>
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
        <div class="row">
                  <div class="container">
                      <div class="row">
                          <div class="about_our_company" style="margin: 20px 0 20px !important;">
                              <h2><?=$langPack['contact']?></h2>
                              <p><?=$langPack['arrange']?></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-8">
                              <!-- <form name="sentMessage" id="contactForm" novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <input type="text" class="form-control" placeholder="<?=$langPack['name']?> *" name="name" id="name" required="" data-validation-required-message="<?=$langPack['name']?>">
                                              <p class="help-block text-danger"></p>
                                          </div>
                                          <div class="form-group">
                                              <input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required="" data-validation-required-message="Please enter your email address.">
                                              <p class="help-block text-danger"></p>
                                          </div>
                                          <div class="form-group">
                                              <input type="tel" class="form-control" placeholder="<?=$langPack['phoneNumb']?> *" name="phone" id="phone" required="" data-validation-required-message="<?=$langPack['phoneNumb']?>">
                                              <p class="help-block text-danger"></p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                          <textarea class="form-control" placeholder="<?=$langPack['message']?> *" name="message" id="message" required="" data-validation-required-message="<?=$langPack['message']?>"></textarea>
                                          <p class="help-block text-danger"></p>
                                          </div>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-lg-12 text-center">
                                          <div id="success"></div>
                                          <button type="submit" name="submit" class="btn btn-xl get"><?=$langPack['act']?></button>
                                          <br><br>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="col-lg-4">
                              <div>
                                  <strong><i class="fa fa-map-marker"></i> Address</strong>
                                  <br>Długa 17, 31-147 Kraków<br>Pasaż Wenecki, «Szczęśliwa sukienka»
                              </div>
                              <div style="margin: 16px 0 16px"><strong><i class="fa fa-phone"></i> Phone Number</strong><br>+48 794 64 64 62</div>
                              <div>
                                  <strong><i class="fa fa-envelope"></i> Email Address</strong><br><a href="mailto:apanolga@gmail.com">info@lucky-dress.eu</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
        <!-- </div> -->
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
            <p>Copyright &copy; Yukai 2017</p>
<div>



</div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

</body>
</html>
