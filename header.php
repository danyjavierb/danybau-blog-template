<!doctype html> <!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class=" ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if (gt IE 7)|!(IE)]><!-->
<html <?php language_attributes();?>>
	<!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
		<title><?php wp_title('|', true, 'right');?> <?php bloginfo('name');?> <?php if ( !wp_title('', true, 'left') ); {
			?>| <?php bloginfo('description');?> <?php }?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>" media="screen" />
		<?php wp_head();?>
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
		
        
		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>	
			
		
		
		
	</head>
	<body <?php body_class();?> >
		<div id="canvas">
			<?php $options = get_option('grisaille_theme_options');?>
			
			
			<div id="header-wrap">
				<div id="top-menu">
					<ul class="main-nav">
						<li class="articles <?php if (is_home() || is_single() ) {echo "current"; } ?>">
							<a href="<?php echo home_url();?>"> <?php if(is_single()){echo 'Go <span>home</span>';}else{echo 'Articles <span>for you</span>';} ?> </a>
						</li>
						<li class="talks <?php if (get_page_link()=="http://www.danybau.com/talks/"){echo "current";} ?>  ">
							<a href="/talks/"> Talks <span>material</span> </a>
						</li>
						<li class="gallery <?php if (get_page_link()=="http://www.danybau.com/gallery/"){echo "current";} ?> " >
							<a href="/gallery/"> Gallery <span>smile</span> </a>
						</li>
						<li class="downloads <?php if (get_page_link()=="http://www.danybau.com/downloads/"){echo "current";} ?>  " >
							<a href="/downloads/"> Downloads <span>use it!</span> </a>
						</li>
						<li class="contact <?php if (get_page_link()=="http://www.danybau.com/contact/"){echo "current";} ?>  ">
							<a href="/contact/"> Contact <span>hello DanyBau</span> </a>
						</li>
					</ul>
				</div>
				<div id="header">
					<div id="site-title">
						<div id="site-logo">
							<img src="<?php bloginfo('template_directory'); ?>/images/dany.png"/> 
						</div>
						
						<div id="site-name">
						<h1><a href="<?php echo home_url();?>">DanyBau Blog</a></h1>
						<div id="site-description">
							<span style="color:#FF963F; ">The mobile version is under Development</span>
							<br />
							Thoughts about Web Development,CS, Education  
							<br />
							and all about what i'm learning and enjoying... <span style="font-size:0.5em" ">in spanish and english</span>	
						</div>
						
						
						</div>
					</div>
					
					<div class="social-media">
								
						<div class="separador">
							<span>GET IN TOUCH...</span>
							
						</div>	
								<ul id="social-list">
									
									<!-- #twitter-->
									<li>
										<a href="https://twitter.com/intent/follow?original_referer=https%3A%2F%2Ftwitter.com%2Fabout%2Fresources%2Fbuttons&screen_name=danyjavierb&source=followbutton&variant=2.0" target="_blank" class="twitter"></a>
										
									</li>

									<li>
										<!-- #g+-->
										<a href="https://plus.google.com/u/0/105563679610347839574/posts" class="gp"></a>
									</li>
									<li>
										<!-- #facebook-->
										<a href="https://facebook.com/danybau" class="facebook"></a>
									</li>
									<li>
										<!-- #flicker-->
										<a href="http://www.flickr.com/photos/64916953@N07/" class="flicker"></a>
									</li>
									<li>
										<!-- #skype-->
										<a href="skype:javierdany?call" class="skype"></a>
									</li>
								</ul>
							</div><!-- #social-icons-->
					
					
				</div>
				
				
				<!-- end #header-->
				<!--by default your pages will be displayed unless you specify your own menu content under Menu through the admin panel-->
			</div>
			
			<!-- end #header-wrap-->
			<div id ="content-container">
				<div id="primaryContent">
					
					
			<ul class="skip">
				<li>
					<a href=".menu">Skip to navigation</a>
				</li>
				<li>
					<a href="#primaryContent">Skip to main content</a>
				</li>
				<li>
					<a href="#secondaryContent">Skip to secondary content</a>
				</li>
				<li>
					<a href="#footer">Skip to footer</a>
				</li>
			</ul>
