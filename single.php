<?php 
  
exit; ?>
<?php get_header(); ?>
<?php the_title(); ?>
<?php
if ( have_posts() ) :
while ( have_posts() ) : the_post();
  the_content();
endwhile;
else:
   _e('Sorry, no posts matched your criteria.');
endif;
?>
<?php get_footer(); ?>