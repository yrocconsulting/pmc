<?php
/**
 * Fallback template: blog index, archives, single posts, search.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero page-hero-center page-hero-sm">
	<div class="container narrow">
		<h1>
			<?php
			if ( is_singular() ) {
				single_post_title();
			} elseif ( is_search() ) {
				printf( 'Search results for “%s”', esc_html( get_search_query() ) );
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				echo 'Insights';
			}
			?>
		</h1>
	</div>
</section>
<section class="section section-tight">
	<div class="container narrow">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( is_singular() ) : ?>
					<article <?php post_class( 'prose entry-content' ); ?>>
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
						<?php the_content(); ?>
					</article>
				<?php else : ?>
					<article <?php post_class( 'post-item' ); ?>>
						<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					</article>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>Nothing here yet.</p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
