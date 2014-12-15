<?php get_header(); ?>

<div id="home-content" class="clearfix">
<span class="archtitle">Products from <?php echo get_query_var( 'term' ); ?> category </span>

<ul id="shelf">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<li class="box" id="post-<?php the_ID(); ?>">
	<?php $disc = get_post_meta($post->ID, 'fabthemes_discount', true); ?>
	<?php if ( $disc ) { ?>
			<span class="salebadge"></span>
	<?php }?>
		<div class="boxtitle">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<a href="<?php the_permalink() ?>"><img class="productshot" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=200&amp;w=170&amp;zc=2" alt=""/></a>
		
		<div class="pricetab clearfix">
		
		<?php if ( $disc ) { ?>
			<span class="oldprice"><del> <?php echo get_post_meta($post->ID, 'fabthemes_disc-price', true) ?> </del></span>
		<?php }?>

		<span class="price"><?php $price=get_post_meta($post->ID, 'fabthemes_price', true); echo $price; ?></span>
		<span class="prodetail"><a href="<?php the_permalink() ?>">Details</a></span>
		</div>
	</li>
<?php endwhile; ?>
</ul>
<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<?php get_footer(); ?>