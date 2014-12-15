<?php
add_action('admin_menu', 't_guide');

function t_guide() {
	add_theme_page('How to use the theme', 'Theme user guide', 8, 'user_guide', 't_guide_options');
	
}

function t_guide_options() {

?>
<div class="wrap">
<div class="opwrap" style="background:#fff; margin:20px 0; width:800px; padding:10px; border:1px solid #ddd;" >

<div id="wrapr">

<div class="headsection">
<h2 style="clear:both; padding:10px 10px; color:#444; font-size:24px; background:#eee">Shop setup guide</h2>
</div>

<div class="gblock">
<h2>Introduction</h2>
<p>The zenshop theme is a n ecommerce theme, But it does not come with a built in ecommerce solution, instead it uses the Cart66 lite wordpress plugin. Once you download and install the theme you will be prompted to install the 2 required plugins </p>
<ol>
<li>Cart66 lite plugin </li>
<li>wp-pagenavi plugin</li>
</ol>

<p>Once installed and activated you can configure your Cart66 shop settings. You can refer the <a href="http://cart66.com/cart66lite-documentation.pdf">PDF manual </a>that is available for the plugin  </p>
<p> Setting up the shop and listing the products for sale is actually a 2 step process. First you will have to add the product Name,its ID, price, variation options etc to the cart66 database. This is the backend process. 
Secondly to feature your product on the front end of the shop you will create a product post ( A custom post type) with the product image and other details. We will see how these are done step by step</p>

</div>

<div class="gblock">
<h2>Adding products to the shop database</h2>

<p>In the adminpanel you will find the products submenu under the cart66 menu. Click on it and it will take you to the " CArt66 products" Page. Fill in the details of your product. Make sure to use a unique "item number" for each product.</p>
<p>In the following screenscast we will see how it is done. I will be listing an iPhone for sale at $500 , with 2 product variations available, black and white.</p>
<p><iframe src="http://www.screenr.com/embed/VZN8" width="650" height="396" frameborder="0"></iframe></p>


</div>

<div class="gblock">
<h2>Setup the front end of the shop</h2>
<p>We just saw how to list our iPhone for sale into the shop database. Next we need to know how to setup the front end of the shop so that buyers can actually see the products and buy them.</p>
<p>This is where the role of Zenshop theme comes into play. The theme is built in with a special custom post type called "products". You will listing your products there and use the <strong>cart66 shortcodes</strong> to create the Cart button and actions.</p>

<p>We will see how it is done in the following screencast</p>
<p><iframe src="http://www.screenr.com/embed/7kN8" width="650" height="396" frameborder="0"></iframe></p>

</div>

<div class="headsection">
<h2 style="clear:both; padding:10px 10px; color:#444; font-size:24px; background:#eee">Theme user guide</h2>
</div>

<div class="gblock">
<h2>Theme options</h2>

<p>The theme comes with an option page where you can configure various settings. </p>

<strong>1.Custom logo</strong>
<p>You will be able to enter a logo image url here</p>

<strong>2. Homepage content</strong>
<p>You can select between a shop or a blog to show on the homepage</p>

<strong>3. Products per page</strong>
<p>Number of products to be displayed per page </p>

<strong>4. Featured product slider</strong>
<p>You can select a product category to be displayed here and the number of products to be shown on the slider.</p>


</div>

<div class="gblock">
<h2>Custom page templates</h2>
<p>Theme comes with 2 custom page templates.To use them you can create a new page and select the appropriate <strong>template</strong> from the dropdown selection at the <strong>page attribute</strong> options.</p>

<ol>
<li>Blog page</li>
<p>You can use the Blog page template to show the blog items when the homepage is set to show the shop. </p>
<li>Full width page</li>
<p>This is a page template without sidebar.</p>

</ol>
</div>

<div class="gblock">
  <h2>How to add featured thumbnail to posts?</h2>
  <p>Check the video below to see how to add featured images to posts. Theme uses timthumb script to generate thumbnail images. Make sure your host has PHP5 and GD library enabled. You will also need to set the CHMOD value for the "cache" folder <strong>within the theme</strong> to "777" or "755" </p>
  <p><object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0' width='560' height='345'><param name='movie' value='http://screenr.com/Content/assets/screenr_1116090935.swf' /><param name='flashvars' value='i=88375' /><param name='allowFullScreen' value='true' /><embed src='http://screenr.com/Content/assets/screenr_1116090935.swf' flashvars='i=88375' allowFullScreen='true' width='560' height='345' pluginspage='http://www.macromedia.com/go/getflashplayer'></embed></object></p>
</div>


<div class="gblock">
<?php echo file_get_contents(dirname(__FILE__) . '/FT/license-html.php') ?>
</div>
 
</div>

</div>

<?php }; ?>
