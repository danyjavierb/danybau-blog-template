<?php get_header(); ?>


 <?php is_tag(); ?>
  <?php if (have_posts()) : ?>

  <div id="archives"> 
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2> &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
   <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2>a <?php the_time('F jS, Y'); ?></h2>
   <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2> <?php the_time('F, Y'); ?></h2>
   <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2><?php the_time('Y'); ?></h2>
   <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2>Author Archive</h2>
   <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2>Blog Archives</h2>
   <?php } ?>
   </div>
 <ol id="posts">
  <?php while (have_posts()) : the_post(); ?>

    <li id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

       <h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
     	 <span class="comments"><?php comments_popup_link('0', '1 ', '%'); ?></span>
      <div class="clearfix"></div>
      <p class="theDate"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_time('F j, Y'); ?></a> by <?php the_author(); ?></p>
	
      <div class="post-wrap">
      <?php the_post_thumbnail('following-post-thumbnails'); ?>

	  <?php the_excerpt(__('keep reading','grisaille')); ?></div>
      <p class="postMeta"><small>Category <?php the_category(', ') ?> | Tags: <?php the_tags(' '); ?></small></p>

      <hr class="noCss" />
    </li>

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

 
 <?php else : ?>

  <p><?php _e('Sorry, no posts matched your criteria.','grisaille'); ?></p>

  <?php endif; ?>


  	<div class="pagination-older"><?php next_posts_link( __('&laquo; Older Entries', 'grisaille')); ?></div>
	<div class=" pagination-newer"><?php previous_posts_link( __(' Newer Entries &raquo;', 'grisaille')); ?></div> 
    


<?php get_footer(); ?>