<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP
//If the form is submitted
if(isset($_POST['submitted'])) {	
	// require a name from user
	if(trim($_POST['contactName']) === '') {
		$nameError =  'You forgot your name!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'You forgot to enter in your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}	
	// we need at least some content
	if(trim($_POST['comments']) === '') {
		$commentError = 'You forgot to enter a message!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}	
	// upon no failure errors let's email now!
	if(!isset($hasError)) {	
		$emailTo = 'hello@marabigo.com';
		$subject = 'Marabigo, Hello from '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		mail($emailTo, $subject, $body, $headers);
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}
?>

<!DOCTYPE HTML>
<head>
	<meta charset="UTF-8">
    
	<title>MARABIGO | CREATIVE STUDIO | NYC</title>
    
<meta name="description" content="MARABIGO like Merlin, but with Moving Pictures.>

<meta name="keywords" content="Creative Studio, Multimedia Production Company, Interactive Agency, Digital Agency, Full Service Interactive Agency, interactive, media, Production services New York, post-production services, post production services New York, Television production, Services to foreign correspondents, media services New York, digital camera crews, TV content production, camera crews for hire, corporate video production, television news production, documentaries production, DVCam crews, television news production, producer for hire, archive footage research, foreign correspondent New York, TV content, Jean Claude Billmaier, producer, director, film crew, graphic design New York, Creative Media New York, creative media, creative excellence, marabigo, MARABIGO, Merlin, Moving Pictures, Motion Pictures">

	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oswald|Open+Sans:400,600' rel='stylesheet' type='text/css'>	
	<!-- CSS Responsive Framework Skeleton -->
	<link rel="stylesheet" href="css/skeleton.css">	
	<!-- CSS Styles -->	
	<link rel="stylesheet" href="css/style.css">
	<!-- Fullscreen Slider -->
	<link rel="stylesheet" href="css/supersized.css">
	<link rel="stylesheet" href="css/supersized.shutter.css">
	<!-- Fancybox -->	
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<!-- Icons -->	
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Flexslider -->	
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Media Queries -->	
	<link rel="stylesheet" href="css/media.css">
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40369967-1', 'marabigo.com');
  ga('send', 'pageview');

</script>

</head>

<body>

	<!-- Homepage -->
	<div id="homepage">
    	<!---CRYSTAKKUSATTION LOGO BACKGROUND --->
		<div id="container"></div>
		<script src="https://raw.github.com/soulwire/sketch.js/master/js/sketch.min.js"></script>
		<script src="http://dat-gui.googlecode.com/git/build/dat.gui.min.js"></script>
		<script src="js/crystallisation.js"></script>
        	
		<div class="container">
			<div class="sixteen columns">
				<div class="button-row">
				<img src="images/logo.png" width="500px" alt="Marabigo - Like Merlin, but with moving pictures - Creative Studio">  
				<br/><br/>
				<span>Like Merlin, but with moving pictures</span>
		<br/><br/><br/>
                <a href="http://www.jeanclaudebillmaier.com/" target="_blank"><img src="images/jcb.png" alt="JCB Marabigo" width="50px"></a>
				</div>              
			</div>
			
			<div class="slider-text">
				<div class="sixteen columns">
					<div class="line"></div>
				</div>
				
				<div class="twelve columns">
					<div id="slidecaption"></div>
				</div>
				
				<div class="three columns">
					<a id="prevslide" class="load-item"><i class="icon-chevron-left"></i></a>
					<a id="nextslide" class="load-item"><i class="icon-chevron-right"></i></a>
				</div>
			</div>
			
		</div>
	</div>
	
	<!-- Historical Page -->	
	<div id="about" class="page">
	
		<div class="container">
        
        
       <!-- <div id="canvasWrapper"></div>-->
		
			<div class="sixteen columns">
				
<h1>Historical</h1>

<div class="one-text">        
<p>Marabigo The Transpermutable was the stage name of Henry Leggingham, an illusionist and showman who made his debut at the 1893 Chicago World’s Fair, where he distributed large posters to passengers of the towering 300 foot Ferris Wheel. He famously accelerated the ride to twenty-four rotations per minute, generating an astonishing spectacle of animated images. Nearby, an infuriated Edward Muybridge was charging ten cents a head for the world’s first motion picture show, his theater’s entrance now obscured by a 300 foot moving cartoon of Muybridge kissing a horse.</p>

<p>Marabigo’s mysterious origin and exotic demonstrations quickly caught the world’s attention, notably his consumption of an entire hot air balloon (without condiments), the catching of a meteor with his left hand, and his teleportation from Boston to a flying monoplane and back, returning with scarcely enough time to catch his young son, who he had tossed from the cockpit. Not to mention, of course, his domestication of a giant squid.</p>

<p>Marabigo hoped to pass his trade secrets to a protégé, but while levitating his son onto the moon in 1909, he tragically missed and launched his successor into space. Renouncing illusionism, Marabigo buried his secrets and turned to the magic of cinema, where he starred in several weekly serials alongside Harry Houdini and a robot built by Thomas Edison. He later produced a comedic two-reeler inside of his own stomach, swallowing and regurgitating all the necessary actors and technicians.</p>

<p>Several years later, Marabigo’s son unexpectedly landed outside Cleveland. But in a tragic twist of fate, Marabigo had died only hours earlier, fatally choking on silent film starlet Clara Bow. Never having inherited his father’s methods, Johnny The Unbustable began an extensive search for the buried secrets, hoping to start an exceptional creative studio under his father’s name.</p>

<p>Unfortunately, while attempting the famous Marabigo comet-catch, Johnny the Unbustable was busted in two, cutting short his search and stature. For the next ninety years, magic and dream enthusiasts interested in the lost secrets would slowly organize. Today this guild of mediamancers* has already done much to dig up and master the methods of its namesake, the Great Marabigo. And they’re always looking for more.</p>

<p style="font-size:10px;font-style:italic;float:right;">*conjurers utilizing the element of media</p>


				</div>
			</div> 
			
			
					</div>
				</div>
	
	<!-- About -->	
	<div id="parallax1">
		<div class="bg1"></div>
		<div class="pattern"></div>
		<div class="container">
			<div class="vertical-text">
            
<p class="prlx-quote">MARABIGO is a creative studio. Our team is comprised of motivated new art enthusiasts coming together to combine their crafts. We like to make things levitate, spin and inspire awe.
<br/><br/>
<img src="images/mstamp.png" width="100px">
</p>
                
                
				
			</div>
		</div>
	</div>
	
    <!-- Portfolio -->
	<div id="portfolio" class="page">
	
		<div class="container">
		
			<div class="sixteen columns">
				<h1>Works</h1>
				<hr>
			</div>
			
			<!-- Start Filters -->
                <ul class="option-set" data-option-key="filter">
                	<li><i class="icon-reorder"></i></li>
			    	<li><a class="selected" href="#filter" data-option-value="*"><span></span>All projects</a></li>
					<li><a href="#filter" data-option-value=".post"><span></span>Post-Production</a></li>
					<li><a href="#filter" data-option-value=".pre"><span></span>Pre-Production</a></li>
                    <li><a href="#filter" data-option-value=".released"><span></span>Released</a></li>
                    <!--<li><a href="#filter" data-option-value=".photography"><span></span>Photography</a></li>-->
		    	</ul>
			<!-- End Filters -->
			
			
			<div id="portfolio_items" class="isotope">
			
			<!-- Start Project -->
			<div class="three columns item isotope-item post released">
				<a href="structure.html">
					<div class="img-wrp">
				        <img class="scaleimg" src="images/thumb_structure.jpg" alt="Structure | Vera Wang | Marabigo NYC" />
				        <div class="overlay-wrp">
		    		        <i class="icon loupe overlay-content"></i>
		    		        <div class="overlay"></div>
				        </div>
				     </div>
			    </a>
				<p class="project-title"><a href="structure.html">Structure</a></p>
				<p class="project-description">Vera Wang <br/><br/>
                
                “Structure” is a short film about the integrity of a design and the beauty of refined detail.</p>
				
                
                <p class="viewp"><a href="structure.html">VIEW PROJECT PAGE</a></p>
				<!-- End Example PrettyPhoto Gallery -->

			</div>	
			
			<!-- Start Project -->	
			<div class="three columns item isotope-item post">
				<a href="8.html">
					<div class="img-wrp">
				        <img class="scaleimg" src="images/thumb_8.jpg" alt="8 Project | Marabigo NYC" />
				        <div class="overlay-wrp">
		    		        <i class="icon loupe overlay-content"></i>
		    		        <div class="overlay"></div>
				        </div>
					</div>
			   </a>
				<p class="project-title"><a href="8.html">8</a></p>
				<p class="project-description">An ever-looping media piece that elevates the ideal kiss to the heights of New York City.</p>
                
                <p class="viewp"><a href="8.html">VIEW PROJECT PAGE</a></p>
			</div>	
			
			<!-- Start Project -->	
			<div class="three columns item isotope-item post">
				
                <a href="chaosanddanger.html">
					<div class="img-wrp">
				        
                        <img class="scaleimg" src="images/thumb_chaos.jpg" alt="Chaos and Danger | Marabigo NYC" />
                       
				        <div class="overlay-wrp">
		    		        <i class="icon loupe overlay-content"></i>
		    		        <div class="overlay"></div>
				        </div>
					</div>
			   </a>
			    <p class="project-title"><a href="chaosanddanger.html">Chaos and Danger</a></p>
				<p class="project-description">he Life and Death of Tommy Chaos and Stacey Danger is the story of a relationship that was destined for conflict from day one. </p>
                
                <p class="viewp"><a href="chaosanddanger.html">VIEW PROJECT PAGE</a></p>
			</div>
			
			<!-- Start Project -->
			<div class="three columns item isotope-item pre">
				
                <a href="aramis.html">
					<div class="img-wrp">
                     	
				        <img class="scaleimg" src="images/thumb_aramis.jpg" alt="Aramis | Marabigo NYC" />
                        
				        <div class="overlay-wrp">
		    		        <i class="icon loupe overlay-content"></i>
		    		        <div class="overlay"></div>
				        </div>
					</div>
				</a>
				<p class="project-title"><a href="aramis.html">Aramis</a></p>
				<p class="project-description">Despite taking every precaution, pessimist dali-esque Aramis finds himself running from his uncanny fears until something unforeseen strikes him.</p>
                
                <p class="viewp"><a href="aramis.html">VIEW PROJECT PAGE</a></p>
			</div>	
			
			<!-- Start Project -->
			<div class="three columns item isotope-item post">
				<a href="maxandmax.html">
					<div class="img-wrp">
				        
                        <img class="scaleimg" src="images/thumb_max.jpg" alt="Max and max | PetParents Tv | Marabigo NYC" />
                        
				        <div class="overlay-wrp">
		    		        <i class="icon loupe overlay-content"></i>
		    		        <div class="overlay"></div>
				        </div>
					</div>
			    </a>
			    <p class="project-title"> <a href="maxandmax.html">Max + max</a></p>
				<p class="project-description">PetParents TV<br/><br/>
                
                When clueless and young Max moves from the Midwest to the Big Apple, he finds his new best friend by chance – a mutt, also named Max.</p>
                
                <p class="viewp"><a href="maxandmax.html">VIEW PROJECT PAGE</a></p>
			</div>	
		
			</div>
			
		</div> 	
		
	</div>
    
    <!-- Twitter -->
	<div id="parallax2">
	    <div class="bg2"></div>
	    <div class="pattern"></div>
	    <div class="container">
	        <div class="eleven columns">
	            <div class="vertical-text">
                <p>Spy on us:</p>
                <div id="twitter"><iframe src="http://widget.stagram.com/in/marabigo/?s=250&w=3&h=1&b=0&p=15" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:795px; height: 265px" ></iframe> <!-- Webstagram - web.stagram.com --></div>
	                <br/>
	                <a href="https://instagram.com/marabigo" target="_blank"><img src="images/instagram-32.png" /></a>
                    <p style="font-size:18px;"></p>
	            </div>
	        </div>
	    </div>
	</div>
	
    
    <!-- Start Services Page 
	<div id="services" class="page">
		<div class="container">
			<div class="sixteen columns">
				<h1>Our Services</h1>
				<div class="one-text">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat hendrerit dictum. Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				</div>
			</div>  
			
			<div class="service one-third column">
				<h3>Production</h3>
				<div class="icon" style="background-image: url(./images/production.jpg)"></div>
				<p class="description">Our motivated team has thorough experience in every aspect of pre-, production and post-production (and all steps in between). We can produce a multitude of different projects, such as music videos, commercials, promos, animations, web series, documentaries, new digital art forms – you name it.</p>
                <p class="description">We can also help with individualized post-production needs; coloring, titling, VFX and editorial.</p>
				</div>
					
			<div class="service one-third column">
				<h3>Consulting / Development</h3>
				<div class="icon" style="background-image: url(./images/Consulting.jpg)"></div>
				<p class="description">We provide creative consulting for inspiring, innovative ideas. Starting from Conceptualization, to Branding, Copywriting, Graphics and Photography. Who better than spirited storytellers to help put a project on its feet?</p>            </div>		
		</div>	
	</div>
	-->

	<!-- Start Contact Page -->
	<div id="contact">
		<div class="pattern"></div>
		
			<div class="sixteen columns">
				
				<!-- Start Contact Block -->
				<div class="card">
                
<h1 class="white">Hello</h1>        
<h2>NEED SOMETHING? SEND US A <font style="text-decoration:underline;">
<a href="mailto:hello@marabigo.com">message</a></font>.</h2>
<p></p>



<div>

		
<?php if(isset($emailSent) && $emailSent == true) { ?>
<p class="info">Your email was sent. Huzzah!</p>
<?php } else { ?>			
<div id="contact-form">
<?php if(isset($hasError) || isset($captchaError) ) { ?>
<p class="alert">Error submitting the form</p>
<?php } ?>               
<form id="contact-us" action="#contact" method="post">
<div class="formblock">
<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" placeholder="Name:" />						
<?php if($nameError != '') { ?>
<span class="error"><?php echo $nameError;?></span> 
<?php } ?>
</div>                      
<div class="formblock">
<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="Email:" />
<?php if($emailError != '') { ?>
<span class="error"><?php echo $emailError;?></span>
<?php } ?>
</div>                    
<div class="formblock">
<textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Message:"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
<?php if($commentError != '') { ?>
<span class="error"><?php echo $commentError;?></span> 
<?php } ?>
</div>                    
<button name="submit" type="submit" class="subbutton">SAY HELLO!</button>
<input type="hidden" name="submitted" id="submitted" value="true" />
</form>			
</div>		
<?php } ?>

</div><!-- End #contact -->
			
            <br/>
					
<ul class="contact-social-icons">

<li><a href="https://www.facebook.com/MarabigoNYC" target="_blank"><img src="images/facebook-32.png" width="55px"/></a></li>
<li><a href="https://twitter.com/marabigo" target="_blank"><img src="images/twitter-32.png" width="55px"/></a></li>
<li><a href="http://instagram.com/marabigo" target="_blank"><img src="images/instagram-32.png" width="55px"/></a></li>
<li><a href="" target="_blank"><img src="images/pinterest-32.png" width="55px"/></a></li>
<li><a href="" target="_blank"><img src="images/tumblr-32.png" width="55px"/></a></li>
                      
                        

</ul>

</div>
				<!-- End Contact Block -->
				
	
	</div>
	
	<div class="copyright">
<p>© 2013 <a href="">MARABIGO NYC.</a> | THE CONTENT FACTORY GROUP, LLC</font> | 175 Varick Street | New York, NY, 10014 U.S.A.</a> | 
            
<a href="mailto:hello@marabigo.com">hello@marabigo.com</a> | <a href="tel:+1-646-741-1780">646.741.1780</a></p>
	</div>		
	
	</div>
    
    
<!-- MENU -->	
<div id="menuBar">
<div class="mnav">
<div class="menu">
 
<ul id="nav" class="links">
<li><div class="menuOption1"><a class="menuLink smoothScroll" href="#homepage"><img src="images/mini.png"></a></div></li>
<li><div class="menuOption2"><a class="menuLink smoothScroll" href="#about">Historical</a></div></li>
<li><div class="menuOption5"><a class="menuLink smoothScroll" href="#portfolio">Works</a></div></li>
<li><div class="menuOption9"><a class="menuLink smoothScroll" href="#about">Services</a></div></li>
<li><div class="menuOption10"><a class="menuLink smoothScroll" href="#contact">Say Hello</a></div></li>
</ul>
 </div>
</div>
</div>
	
	
	<!-- JavaScripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/supersized.3.2.7.min.js"></script>
	<script src="js/supersized.shutter.min.js"></script>
	<script src="js/supersized.images.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.parallax-1.1.3.js"></script>
	<script src="js/last-tw.js"></script>
	<script src="js/paralax-ini.js"></script>
	<script src="js/scroll.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/selectnav.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.smartresize.js"></script>
	<script src="js/shortcodes.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="http://yui.yahooapis.com/combo?3.1.0/build/yui/yui-min.js"></script>
    <script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
     <script src="js/detectmobile.js"></script>
    
	<script>
	    $(window).load(function(){
	      $("nav").sticky({ topSpacing: 0, className: 'sticky', wrapperClassName: 'my-wrapper' });
	    });
    </script>
	
	<script>
		$(function(){
			$('.item').show();
			var $container = $('#portfolio_items');
			$container.isotope({
				itemSelector : '.item'
			});
			var $optionSets = $('.option-set'),
				$optionLinks = $optionSets.find('a');
			$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
					return false;
				}
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected');
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
				
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
				if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				// changes in layout modes need extra logic
				changeLayoutMode( $this, options )
			} else {
				// otherwise, apply new options
				$container.isotope( options );
			}    
			return false;
			});
			
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
				var $isMobile = true;
			}
			
			
			
		});
	</script>
	
	<script type="text/javascript">
    	function moveTo(contentArea){
        	var goPosition = $(contentArea).offset().top;
        	$('html,body').animate({ scrollTop: goPosition}, 'slow');
        }
    </script>
    
    <script>
		selectnav('nav', {
			nested: true,
			indent: '-'
		});
    </script>

	<script>
		$(function(){
			//SyntaxHighlighter.all();
			});
				$(window).load(function(){
				$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
				  $('body').removeClass('loading');
				}
			});
		});
	</script>
    
    <script>
		$(document).ready(function() {
			$(".fancybox").fancybox({
				padding : 0,
				beforeShow: function () {
				
							this.title = $(this.element).attr('title');
							this.title = '<h4>' + this.title + '</h4>' + $(this.element).find('img').attr('alt');
							
    
				            if (this.title) {
				                // New line
				                this.title += '<br />';
				                
				                // Add tweet button
				                this.title += '<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-url="' + this.href + '">Tweet</a> ';
				                
				                // Add FaceBook like button
				                this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';
				            }
				        },
		        afterShow: function() {
		            // Render tweet button
		            twttr.widgets.load();
		        },
				helpers : {
					title : { type: 'inside' },
				}
			});
			$('.fancybox-media').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				helpers : {
					media : {},
				}
			});
		});
		
$(function() {
$('.menu a').stop().animate({'margintop':'-103px'},1000);
$('.menu > .menuOption').hover(
function () {
$('a',$(this)).stop().animate({'margintop':'-2px'},200);
},
function () {
$('a',$(this)).stop().animate({'margintop':'-103px'},200);
}
);
});


	</script>
    
    <!--<script>
	YUI({
		      modules: {
		            'canvas': {
		                fullpath: 'js/canvas.js',
		                requires: ['widget', 'io-base', 'profiler', 'async-queue']
		            }
		        }
		    }).use('widget', 'io-base', 'profiler', 'async-queue', 'canvas', function(Y) {
		        var canvas = new Y.TwoAndaHalfPeople.Canvas({
					spotlightRadius: 250,
					ambientDarkness: 0.6,
					canvasWidth: 940,
					canvasHeight: 724,
					backgroundImgSrc: 'images/about.jpg',
					foregroundImgSrc: 'images/y2.png'
				});
		        canvas.render('#canvasWrapper');
		    });
	</script>-->
	
	<script src="http://api.twitter.com/1/statuses/user_timeline/marabigo.json?callback=twitterCallback2&count=1"></script>
    
    
    
    
    
<script type="text/javascript">
  <!--
  if (screen.width <= 700) {
    window.location = "http://www.marabigo.com/mobile/";
  }
  //-->
</script>
		
</body>
<!-- The End. Visit our site THEMES.TVDA.EU -->