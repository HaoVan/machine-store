<?php get_header(); ?>

<div id="home-content" class="clearfix">
<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post clearfix" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="postmeta">
		<span class="author"> <?php the_author(); ?> </span>
		<span class="clock"> <?php the_time('M - j - Y'); ?></span>
</div>

<div class="entry entry-right">
	<img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=150&amp;w=250&amp;zc=1" alt="" />
	<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
	<div class="clear"></div>
</div>


</div>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>