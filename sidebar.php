<div class="wrap">

	<?php if ( is_active_sidebar( 'grisaillesidebar' ) ) :
	?>

	<?php dynamic_sidebar('grisaillesidebar'); ?>

	<?php else : ?>

	<div class="sidebaritem">
		<section class="separador">
			<span>MY SPONSORS...</span>

		</section>
		<ul>
			<h3 style="font-size:0.7em">Looking for a web hosting sponsor</h3>
		</ul>
	</div>
	
<div class="separador">
			<span>SEARCH...</span>

		</div>
	<section id="search" class="sidebaritem">
		<label for="s"><?php _e('Search:', 'grisaille'); ?></label>
		<form id="searchform" method="get" action="<?php echo home_url(); ?>">
			<div>
				<input type="text" name="s" id="s" size="15" />
				<input id="searchBtn" type="submit" value="<?php _e('Search', 'grisaille'); ?>" />
			</div>
		</form>
	</section>
<div class="separador">
			<span>P2PU ROCKS...</span>

		</div>
	<section id="p2pu" >
		
		<img src="<?php bloginfo('template_directory'); ?>/images/p2pu-logo.png" alt="peer to peer university"></img>
		<p> At P2PU, people work together to learn a particular topic by completing tasks, assessing individual and group work, and providing constructive feedback.</p>
		<p>If you have a nice idea for the P2PU platform, and you know how to code it. Cool, do it at <a href="https://github.com/p2pu/lernanta">our github repository.</a></p>
		<p> If you dont, let me know, and we will convert your nice idea into nice code.</p>
	</section>
 
 
 <div class="separador">
			<span>NICE TWEETS, NICE PEOPLE...</span>

		</div>
	<section id="twitter"  class="sidebaritem">
		<div id="loader">
		<img style="margin:0 auto;border:none;display:block;" src="<?php bloginfo('template_directory'); ?>/images/loader.gif"/>
		<span style="display:block;font-size:0.7em;text-align:center;">loading tweets...</span>
		</div>	
	</section>
	<?php endif; ?>
</div>