<?php 	
	add_action('init', 'project_products_init');  

	/*-- Custom Post Init Begin --*/
	function project_products_init()
	{
	  $labels = array(
		'name' => _x('Products', 'post type general name'),
		'singular_name' => _x('Product', 'post type singular name'),
		'add_new' => _x('Add New', 'product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product'),
		'new_item' => __('New Product'),
		'view_item' => __('View Product'),
		'search_items' => __('Search Products'),
		'not_found' =>  __('No products found'),
		'not_found_in_trash' => __('No products found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Products'

	  );

	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields','comments')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('products',$args);

	  
	  
	  
	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Category' ),
		'all_items' => __( 'All Category' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
	  );
	  
	// Custom taxonomy for Project Tags
	register_taxonomy('product-category',array('products'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'product-category' ),
	  ));

	}
	/*-- Custom Post Init Ends --*/
?>