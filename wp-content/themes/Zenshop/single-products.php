<?php get_header(); ?>

<div id="home-content" class="clearfix">
<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="prodmeta clearfix">
		<span class="procategori"> Product Categories: <?php echo get_the_term_list( $post->ID, 'product-category', '', ', ', '' ); ?>   </span>
	</div>
	
	<a class="propic" href="<?php get_image_url(); ?>"> <img class="productimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=400&amp;w=600&amp;zc=2" alt=""/></a>
	<div class="title">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div>

	<div class="entry">

		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="scart clearfix">
		<?php echo apply_filters('the_content', get_post_meta($post->ID, 'fabthemes_cartcode', true)); ?> 
		</div>
		<div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>

	
</div>

<?php //comments_template(); ?> <!-- Comments not enabled -->

<?php endwhile; endif; ?>
</div>

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>