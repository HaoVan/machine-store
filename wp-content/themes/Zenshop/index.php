<?php get_header(); ?>
<?php
if(get_option('zens_home') == "blog") { ?>	
<?php include (TEMPLATEPATH . '/lib/blog-home.php'); ?>
<?php } else { ?>

<div id="featured">

<div class="flexslider">
	<ul class="slides">
	<?php 
		$slide = get_option('zens_slide_cat');
		$count = get_option('zens_slide_count');
		$slide_query = new WP_Query( 'post_type=products&product-category='.$slide.'&posts_per_page='.$count.'' );
		while ( $slide_query->have_posts() ) : $slide_query->the_post();
	?>	
	<li>
		<a href="<?php the_permalink() ?>"><img class="slideimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_image_url()?>&amp;h=300&amp;w=500&amp;zc=2" title="" alt="" /></a>
		<div class="flex-caption">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php wpe_excerpt('wpe_excerptlength_slide', ''); ?>
			<div class="slidetab">
			<span class="sprice"><?php $price=get_post_meta($post->ID, 'fabthemes_price', true); echo $price; ?></span>
			<span class="spdetails"><a href="<?php the_permalink() ?>">Product Details</a></span>
			</div>
		</div>
	</li>
	<?php endwhile; ?>
	</ul>
</div>

</div>
<div id="home-content" class="clearfix">
<ul id="shelf">

	<?php
		$home_count = get_option('zens_home_count');
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('posts_per_page='.$home_count.'&post_type=products'.'&paged='.$paged);
	?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
	
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
	<div class="clear"></div>
	<?php getpagenavi(); ?>
	<?php $wp_query = null; $wp_query = $temp;?>
	
</ul>
</div>
<?php get_footer(); ?>
<?php } ?>