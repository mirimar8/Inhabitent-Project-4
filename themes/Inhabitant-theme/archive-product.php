<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'template-parts/content' );
				?>

			<?php endwhile; ?>

			<h2><?php echo CFS()->get( 'shop_title' ); ?></h2>
			<?php
				$args = array(
				'order' => 'ASC',
				'posts_per_page' => 16,
				'post_type' => 'product',
				);
			?> 

			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ) : ?>
   				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
      				<h1><?php the_title(); ?></h1>
    				 	<?php the_content(); ?>
   				<?php endwhile; ?>
   				<?php the_posts_navigation(); ?>
				<?php wp_reset_postdata(); ?>
				  
			<?php else : ?>
      			<h2>Nothing found!</h2>
			<?php endif; ?>


			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
