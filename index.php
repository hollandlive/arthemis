<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package arthemis
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-md-6">
				<div class="thumbnail">
				<div class="label label-success price"><span class="glyphicon glyphicon-tag"></span> <sup>Category</sup>33</div>
				<div class="caption">
				<h4 class="text-right"><?php echo get_the_category_list(); ?></h4>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

				<?php
				/* I slightly changed the _strap index.php file
				* to show the post permalink, thumbnail 200x300 (style.css line 1120: height: 200px;)
				* added Glyphicons above (label), excerpt below the thumbnail
				* and the date/author  - A. A. 26.09.2015
				*/
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail('medium');
								} 
					/* 
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 
					get_template_part( 'template-parts/content', get_post_format() );
				*/
					?>
				<p><?php the_excerpt() ;?></p>
				<p class="text-left text-muted">Posted by <?php the_author(); ?></p><small> on <?php the_time('F j:s Y'); ?></small></p>

				</div>
				</div>
				</div>


			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
