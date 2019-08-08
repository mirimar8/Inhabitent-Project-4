<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header('front-about'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; ?>

			<div class="container">
			<h2><?php echo CFS()->get( 'shop_title' ); ?></h2>

			<div class="front-tax-products">

				<?php $terms = get_terms( array(
    			'taxonomy' => 'product_type',
    			'hide_empty' => false,
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

					$count = count( $terms );
					$i = 0;

					$tax_images = array('do','eat','sleep','wear');
					
					foreach ( $terms as $term ) {?>
						<div class="front-shop-block">

							<img src='<?php echo home_url() ?>/wp-content/themes/Inhabitant-theme/images/product-type-icons/<?php echo $tax_images[$i] ?>.svg'>
							<p><?php echo $term->description ?></p>
							<a href="<?php echo esc_url( get_term_link($term)); ?>"><?php echo $term->name ?> Stuff</a>

						</div>
						
						<?php $i++; 
					}
				} 
				?>
				
			</div>	

			<h2><?php echo CFS()->get( 'journal_title' ); ?></h2>

			<div class="front-journal-posts">
			
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
				<div class="front-post">
				  
					<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>

					<div class="front-post-info">

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
					<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>

					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">',esc_url( get_permalink() ) ),'</a></h3>' ); ?>
					
					<div class="buttons-wrapper">
						<a class="link-button" href=" . <?php echo get_permalink();?> .">READ ENTRY</a>
					</div>
					</div>
				</div>	
   					<?php endwhile; ?>
   				<?php the_posts_navigation(); ?>
				<?php wp_reset_postdata(); ?>
				  
			<?php else : ?>
      			<h2>Nothing found!</h2>
			<?php endif; ?>
			</div>	
			</div>


			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
