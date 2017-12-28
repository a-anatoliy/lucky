<!DOCTYPE html>
<html lang="en">
<?php
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
$cfg = require 'data/cfg/config.php';
$langPack = require 'data/cfg/lang.php';
$lang='pl';
$langPack=$langPack[$lang];
session_start();
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
    <link href="/css/grayscale.css" rel="stylesheet">
    <link href="/css/gallery.css" rel="stylesheet">

    <!-- gallery -->
    <link rel="stylesheet" href="/css/baguetteBox.css">
    <script src="/js/baguetteBox.min.js" async></script>

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
                <li><a class="page-scroll" href="/">About</a></li>
                <li><a class="page-scroll" href="/#contact">Contact</a></li>
                <li><a class="page-scroll" href="#">gallery</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container gallery">
    <div class="row text-center">
        <div class="col-sm-12 col-md-8 col-lg-9 text-center">
            <h4 class="galleryName">GALLERY</h4>
            <div class="gallerImages">

                <div class="galleryMoshna">
                    <?php
                    /** settings **/
                    $images_dir = 'img/sessions/dayOne';
                    $thumbs_dir = 'img/sessions/dayOne/thumbs';

                    /** generate photo gallery **/
                    $image_files = get_files($images_dir);
                    if(count($image_files)) {
                        $index = 0;
                        foreach($image_files as $index => $file) {
                            $index++;
                            $thumbnail_image = $thumbs_dir.'/'.$file;
                            $format="";
                            echo sprintf("\n<a class='photo-link' href=\"/%s/%s\">\n\t<img src=\"%s\">\n</a>",$images_dir,$file,$thumbnail_image);
                        }
                    } else { echo '<p>There are no images in this gallery.</p>'; }

                    /* function:  returns files from dir */
                    function get_files($images_dir,$exts = array('jpg')) {
                        $files = array();
                        if($handle = opendir($images_dir)) {
                            while(false !== ($file = readdir($handle))) {
                                $extension = strtolower(get_file_extension($file));
                                if($extension && in_array($extension,$exts)) {
                                    $files[] = $file;
                                }
                            }
                            closedir($handle);
                        }
                        return $files;
                    }

                    /* function:  returns a file's extension */
                    function get_file_extension($file_name) {
                        return substr(strrchr($file_name,'.'),1);
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p><div class="fb-like" data-href="https://www.facebook.com/luckydresskrakow/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></p>
        <p>Copyright &copy; Yukai 2017</p>
    </div>
</footer>

<!-- jQuery -->
<script src="/vendor/jquery/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="/vendor/jquery.easing.min.js"></script>
<!-- Theme JavaScript -->
<!--<script src="/js/grayscale.js"></script>-->
<script src="/js/grayscale.min.js"></script>

<!--[if lt IE 9]>
<script>
    var oldIE = true;
</script>
<![endif]-->
<script>
    window.onload = function() {
//        baguetteBox.run('.baguetteBoxOne');
//        baguetteBox.run('.baguetteBoxTwo');
        baguetteBox.run('.galleryMoshna', { animation: 'fadeIn', noScrollbars: true });
//        baguetteBox.run('.baguetteBoxFour', { buttons: false });
//        baguetteBox.run('.baguetteBoxFive', { captions: function(element) {
//                return element.getElementsByTagName('img')[0].alt;
//            }
//        });

//        if (typeof oldIE === 'undefined' && Object.keys) {
//            hljs.initHighlighting();
//        }
    };
</script>

</body>
</html>
