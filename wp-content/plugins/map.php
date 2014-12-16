<?php

/*
Plugin Name: Maps
Description: Google maps
Author: Van Quoc Hao
Version: 1.0
*/
class map{
    
    private $lat;
    private $lng;
    private $add;
    private $phone;
    private $email;
    private $clienId;
    private $blogname;
    private $_content;
    private $maplat;
    private $maplng;
            
    function __construct() {
        add_shortcode( 'mapshortcode', array($this,'map_shortcode_handler' ));
        add_action('admin_menu', array($this,'my_plugin_menu'));
        $this->getData();
    }
    
    function getData(){
        $this->lat =  get_option('_blog_lat');
        $this->lng =  get_option('_blog_lng');
        $this->maplat =  get_option('_map_lat');
        $this->maplng =  get_option('_map_lng');
        $this->add =  get_option('_blog_add');
        $this->phone =  get_option('_blog_phone');
        $this->email =  get_option('_blog_email');  
        $this->clientId =  get_option('googlemapapi',null);
        $this->blogname = get_option('blogname');
        $this->_content='<p><Strong style="color:#0FBE7C;font-size:medium">'.$this->blogname.'</strong>';
        $this->_content.="<br /><strong>Address</strong>: $this->add <br />";
        $this->_content.= "<strong>Email</strong>: $this->email<br/>";
        $this->_content.= "<strong>Phone</strong>: $this->phone </p>";
    }
    
    function map_shortcode_handler($page){
        
        if (strpos($_SERVER['REQUEST_URI'],'wp-admin')!==false ){
            exit();
        }
        
        if($this->clientId==null){
            exit();
        }
        
        $str="<div id='map-canvas' style='height:350px;width:640px;margin-bottom:25px'></div>";
        $str.='<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
        $str.="<script> google.load('maps', '3', {other_params:'sensor=false', callback: function(){";
        $str.="
                var myLatLng = new google.maps.LatLng($this->lat, $this->lng);
                var mapOptions = {
                    zoom: 15,
                    center: new google.maps.LatLng($this->maplat, $this->maplng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                
                var map = new google.maps.Map(document.getElementById('map-canvas'),
                                              mapOptions);
                
                var beachMarker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: '$this->blogname'
                });
                var infowindow = new google.maps.InfoWindow({
                    content: '$this->_content',
                });
                
                infowindow.open(map, beachMarker);

            }});";
        $str.="</script>";
        return $str;
        
    }

    /*admin Menu
     *  Page title:     My Plugin Options
     *  Menu title:     My Plugin
     *  Menu Position:  manage_options
     *  Page:           my-map
     *  Menu function:  my_plugin_options
     *  
     *  PS: if the function was created in a class we need to put it like this "array($this,'my_plugin_options')"    
     */
    function my_plugin_menu() {
        add_options_page( 'My Plugin Options', 'Google Map', 'manage_options', 'my-map', array($this,'my_plugin_options' ));
    }

    function my_plugin_options() {
        
            if($_POST['action']=='update'){
                
                $blogadd = $_POST['blogadd'] == "" ? "" : $_POST['blogadd'];
                add_option( '_blog_add', $blogadd, '', 'yes');
                
                $blogphone = $_POST['blogphone'] == "" ? "" : $_POST['blogphone'];
                add_option('_blog_phone', $blogphone, '','yes');
                
                $blogemail = $_POST['blogemail'] == "" ? "" : $_POST['blogemail'];
                add_option('_blog_email', $blogemail , '', 'yes');
                
                $bloglat = $_POST['bloglat'] == "" ? "" : $_POST['bloglat'];
                add_option('_blog_lat', $bloglat , '', 'yes');
                
                $bloglng = $_POST['bloglng'] == "" ? $bloglat : $_POST['bloglng'];
                add_option('_blog_lng', $bloglng , '', 'yes');
                
                $maplat = $_POST['bloglat'] == "" ? "" : $_POST['bloglat'];
                add_option('_map_lat', $maplat , '', 'yes');
                
                $maplng = $_POST['bloglng'] == "" ? $bloglat : $_POST['bloglng'];
                add_option('_map_lng', $maplng , '', 'yes');
                
                $blogapi = $_POST['googlemapapi'] == "" ? "" : $_POST['googlemapapi'];
                add_option('googlemapapi', $blogapi , '', 'yes');
                echo("<div class='updated'><p><strong>Setting saved</strong></p></div>");
                
                
            }
        ?>
            
        <div class="wrap">
            <h2>Map info</h2>

            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>" novalidate="novalidate">
                <input type="hidden" name="option_page" value="modify">
                <input type="hidden" name="action" value="update">
                <input type="hidden" id="_wpnonce" name="_wpnonce" value="2912aebdf6">
                
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="blogadd">Address</label></th>
                            <td>
                                <input name="blogadd" type="text" id="blogname" value="<?php echo $this->add?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blogphone">Phone</label></th>
                            <td>
                                <input name="blogphone" type="text" id="blogphone" value="<?php echo $this->phone?>" class="regular-text">
                                <p class="description">In a few words, explain what this site is about.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="new_admin_email">E-mail Address </label></th>
                            <td>
                                <input name="blogemail" type="email" id="blogemail" value="<?php echo $this->email?>" class="regular-text ltr">
                                <p class="description">This address is used for contacting</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="bloglat">Latitude </label></th>
                            <td>
                                <input name="bloglat" type="text"  value="<?php echo $this->lat?>" class="regular-text ltr">
                                <p class="description">Latitude get from google map</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="bloglng">Longitude</label></th>
                            <td>
                                <input name="bloglng" type="text"  value="<?php echo $this->lng?>" class="regular-text ltr">
                                <p class="description">Longitude get from google map</p>
                            </td>
                        </tr>
<!--                        <tr>
                            <th scope="row"><label for="maplat">Map Latitude </label></th>
                            <td>
                                <input name="maplat" type="text"  value="<?php echo $this->maplat?>" class="regular-text ltr">
                                <p class="description">Map position Latitude </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="maplng">Map Longitude</label></th>
                            <td>
                                <input name="maplng" type="text"  value="<?php echo $this->maplng?>" class="regular-text ltr">
                                <p class="description">Map position Longitude</p>
                            </td>
                        </tr>-->
                        <tr>
                            <th scope="row"><label for="googlemapapi">Google map API</label></th>
                            <td>
                                <input name="googlemapapi" type="text" id="blogemail" value="<?php echo get_option('googlemapapi')?>" class="regular-text ltr">
                                <p class="description">Google Map API <a href="https://code.google.com/apis/console/">here</a>.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>

        </div>

        <?php
    }
    
}
new map();
