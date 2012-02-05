<?php
/**
 * Archive Template
 * 
 * @package: WBootStrap
 * @file: archive.php
 * @author Ohad Raz 
 * @since 0.1
 */
 ?>
<?php get_header(); ?>
		<div class="row"><!-- main container -->
			<div class="<?php echo apply_filters('archive_content_row_span_class','span8'); ?>"><!-- content container -->
			<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts Categorized:", "WBootStrap"); ?></span> <?php single_cat_title(); ?>
						</h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "WBootStrap"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "WBootStrap"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "WBootStrap"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "WBootStrap"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "WBootStrap"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
							<?php the_post_thumbnail( 'WBootStrap' ); ?>
							<h3 class="single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="meta"><?php _e("Posted", "WBootStrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "WBootStrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "WBootStrap"); ?> <?php the_category(', '); ?>.</p>
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php 
							echo apply_filters('before_post_content','');
							the_content();
							echo apply_filters('after_post_content','');
							?>
						</section> <!-- end article section -->
						
						<footer>
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ' , ', '</p>'); ?>
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
					
			<?php 
				
			endwhile;
				if (function_exists('page_navi')) { // if expirimental feature is active 
					page_navi(); // use the page navi function 
				 } else { // if it is disabled, display regular wp prev & next links ?>
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "WBootStrap")) ?></li>
							<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "WBootStrap")) ?></li>
						</ul>
					</nav>
				<?php } 

			 else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h3><?php _e('Not Found','WBootStrap'); ?></h3>
					    </header>
					    <section class="post_content">
					    	<p><?php _e('Sorry, but the requested resource was not found on this site.','WBootStrap'); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
			<?php endif; ?>
			</div><!-- end content container -->
			
			<?php get_sidebar('blog'); ?>
			
		</div><!-- end main container -->
		
<?php get_footer(); ?>