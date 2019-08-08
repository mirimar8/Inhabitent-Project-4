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
				<h1 class="page-title">SHOP STUFF</h1>
				
				<?php $terms = get_terms( array(
    			'taxonomy' => 'product_type',
    			'hide_empty' => false,
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					$count = count( $terms );
					$i = 0;
					$term_list = '<p class="my_term-archive">';
					foreach ( $terms as $term ) {
						$i++;
						$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
					}
					echo $term_list;
				}
			?>
			</header><!-- .page-header -->

			

			<?php /* Start the Loop */ ?>
			<div class="products-grid">

			<?php while ( have_posts() ) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<header class="entry-header">
					
						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" >
							<?php the_post_thumbnail('large' ); ?></a>
						<?php endif; ?>

						<div class="product-info">	
						<?php the_title( sprintf( '<p class="entry-title">', esc_url( get_permalink() ) ), '</p>' ); ?>
						<p class="grid-price"><?php echo CFS()->get( 'price' ); ?></p>
						</div>
				
				
				</header><!-- .entry-header -->
			
			</article><!-- #post-## -->
		

			<?php endwhile; ?>
		
			</div>	
			
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
