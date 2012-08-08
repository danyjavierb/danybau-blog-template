<?php get_header(); ?>

<div id="content" class="error-page">
 <h2><span>Area 404</span> <br /> Nonexistent Area</h2>
 <p><strong>This place does not exist. You were never here.</strong><br />
</p>
<dl>
	<dt>Leave now by either:</dt>
    	<dd> Going <a href="<?php echo home_url(); ?>">HOME</a> 
 		or try doing a Search.</dd>
 </dl>

	<?php get_search_form(); ?> 
 
    
 
</div> <!-- end #content -->


<?php get_footer(); ?>