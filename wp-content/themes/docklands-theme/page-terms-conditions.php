<?php
/**
 * The template for displaying pages with sidebar.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
$page_id = get_the_ID();
?>

	<div id="primary" class="">
		<div id="content" class="site-content" role="main">

			<?php get_sidebar( 'left' ); ?>

			<div class="col-sm-9 right">

				<?php odin_breadcrumbs(); ?>

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
				?>

				
					<?php
					    $args = array(
					    	'post_type' => 'page',
					    	'post_parent' => $page_id
					   );
					 
					$subpages_query = new WP_Query( $args );

					if( $subpages_query->have_posts() ) {

					while ( $subpages_query->have_posts() ) : $subpages_query->the_post(); ?>
					 
					<div class="each row">
						<div class="left col-md-8">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Continue reading >>></a>
						</div><!-- left -->
						<div class="thumb col-md-4">
							<?php if (has_post_thumbnail()) {
								the_post_thumbnail();
							} ?>
						</div><!-- thumb -->
						
					</div><!-- each -->
					     
					<?php
					    endwhile;
					    }
					    ?>
	
						
				<?php 
					endwhile;
				?>

			
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
