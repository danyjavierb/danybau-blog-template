<?php get_header();?>

<?php if (have_posts()) : $grisaillePostCount = 0; while (have_posts()) : the_post(); $grisaillePostCount++;
?>

<div <?php if($grisaillePostCount == 1) { ?>class="home-post first"<?php } else {?>class="home-post"<?php }?> id="post-<?php the_ID();?>">
	<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h2>
	<?php if($grisaillePostCount == 1) { ?><div id="lastest"></div><?php } else {}?>
	
	<?php $comments=  get_comments_number();
	//soon, oval size depends of comments number.
	 ?>
	
	<div class="comments"><?php comments_popup_link('0', '1 ', '%');?></div>
	<div class="clearfix"></div>
	
	<div class="date">
		<span class="month"><?php the_time('M');?></span>
		<span class="day"><?php the_time(d);?></span>
		<span class="year"><?php the_time('Y');?></span>
		
		
		</div>
	<div class="division">
		
	</div>
	<div class="post-wrap">
		<?php
		if ($grisaillePostCount == 1) { the_post_thumbnail();
		} else { the_post_thumbnail('following-post-thumbnails');
		}
		?>
		<?php the_content( "¡more please!", false ); ?>
	</div>
	<?php wp_link_pages(array('before' => '<p class="pages-links">' . __('Pages:', 'grisaille'), 'after' => '</p>', 'next_or_number' => 'number', 'nextpagelink' => __('Next page', 'grisaille'), 'previouspagelink' => __('Previous page', 'grisaille'), 'pagelink' => '%'));?>
	<p class="postMeta">
		<small>Ingredients: <?php  the_tags(' '); ?></small>
	</p>
	
	<hr class="noCss" />
</div>

<?php endwhile;?>

<?php else:?>

<p>
	<?php _e('Sorry, no posts matched your criteria.', 'grisaille');?>
</p>
<?php endif;?>

<div class="home-pagination">
	<div class="pagination-older">
		<?php next_posts_link(__('&laquo; Older Entries', 'grisaille'));?>
	</div>
	<div class=" pagination-newer">
		<?php previous_posts_link(__(' Newer Entries &raquo;', 'grisaille'));?>
	</div>
</div>
<?php get_footer();?>