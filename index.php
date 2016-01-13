<?php get_header(); ?>
<div class="tab-content" ng-controller="SwipeCtrl" ng-swipe-left="navigateTo(1)" ng-swipe-right="navigateTo(-1)">
<?php
$posts = get_posts('orderby=ID&order=asc&post_type=post');

foreach ( $posts as $post ) :
  setup_postdata( $post );
  ?>
<div class="tab-pane column col-md-12" id="<?php echo $post->post_name ?>" rb-set-title="Raphael Brand ~ <?php the_title(); ?>">
	<div class="row">
	    <?php the_content(); ?>
	</div>
</div>
<?php endforeach;
wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>