<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

    <div id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

      <h1 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <span class="comments"><?php comments_popup_link('0', '1 ', '%'); ?></span>
       <div class="clearfix"></div>
       <p class="theDate"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_time('F j, Y'); ?></a> by <?php the_author(); ?></p>
       
      <div class="post-wrap"><?php the_content(); ?></div>
      <?php wp_link_pages(
      			array(	'before'           => '<p class="pages-links">' . __('Pages:','grisaille'),
    					'after'            => '</p>',
      					'next_or_number'   => 'number',
    					'nextpagelink'     => __('Next page','grisaille'),
    					'previouspagelink' => __('Previous page','grisaille'),
    					'pagelink'         => '%')); ?>
      <p class="postMeta"><?php edit_post_link(__('Edit', 'grisaille'), ''); ?></p>	
    </div>

	  <?php comments_template(); // Get wp-comments.php template ?>

  <?php
  

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  get_footer();
?>