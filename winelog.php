<?php
/*
Plugin Name: WineLog
Plugin URI: http://www.winelog.net/wordpress
Description: Include WineLog Badges on Your Blog
Version: 1.0
Author: Jason Coleman
Author URI: http://www.strangerstudios.com
*/

//includes
require_once("includes/functions.php");

//default options
if(wl_getOption("winebadge_embed") == "")
	wl_setOption("winebadge_embed", "php");
	
if(wl_getOption("winelist_embed") == "")
	wl_setOption("winelist_embed", "php");
	
//shortcode function
function wl_winebadge_shortcode($atts, $content=null, $code="") {
	global $post;
	
	// $id    ::= winelog id of the wine (the # in the URL)
	// example: [winebadge id="54195"]
	
	extract(shortcode_atts(array(
		'id' => NULL,		
	), $atts));
	
	//no id, let them know
	if(!$id)
		return "[missing winelog id in your shortcode]";

	$method = wl_getOption("winebadge_embed");
	if($method == "javascript")		
		$r = "<script type=\"text/javascript\" language=\"javascript\" 
src=\"http://www.winelog.net/badges/show/?w=" . $id . "\"></script> ";
	else	//method == php
		$r = file_get_contents("http://www.winelog.net/winebadge.php?w=" . $id);
	
	return $r;
}
add_shortcode('winebadge', 'wl_winebadge_shortcode');

//shortcode function
function wl_winelist_shortcode($atts, $content=null, $code="") {
	global $post;
	
	// $query    ::= query string to search for wines. can be tag, winery, or any text
	// $num		 ::= number of wines to show
	// example: [winelist query="Rraxis" num="4"]
	
	extract(shortcode_atts(array(
		'query' => NULL,	
		'num' => NULL
	), $atts));
	
	//no id, let them know
	if(!$query)
		return "[missing query in your shortcode]";

	$method = wl_getOption("winelist_embed");
	if($method == "javascript")		
		$r = "<script type=\"text/javascript\" language=\"javascript\" 
src=\"http://www.winelog.net/winelistjs.php?s=" . $query . "&n=" . $num . "\"></script> ";
	else	//method == php
		$r = file_get_contents("http://www.winelog.net/winelist.php?s=" . $query . "&n=" . $num);
	
	return $r;
}
add_shortcode('winelist', 'wl_winelist_shortcode');

//setup and function for mailing list tab
function wl_add_pages() 
{
	add_options_page('WineLog', 'WineLog', 8, 'winelog', 'wl_settings');
}
function wl_settings()
{
	require_once("adminpages/settings.php");
}
add_action('admin_menu', 'wl_add_pages');

//stylsheet and header code
function wl_addHeaderCode() 
{
	?>
	<link type="text/css" rel="stylesheet" href="<?=get_bloginfo('wpurl')?>/wp-content/plugins/winelog/css/winelog.css" />
    <?php
}
add_action('wp_head', 'wl_addHeaderCode');





















?>