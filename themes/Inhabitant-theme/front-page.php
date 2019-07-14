<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main front-page" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; ?>

			<h2><?php echo CFS()->get( 'journal_title' ); ?></h2>
			<?php
				$args = array(
				'order' => 'DSC',
				'posts_per_page' => 3,
				'post_type' => 'post',
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
