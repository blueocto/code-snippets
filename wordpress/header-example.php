<!-- 
	Use the proper DOCTYPE.
	The opening tag should include language_attributes().
	The "content-type" meta element should be placed before everything else, including the title element.
	Use bloginfo() to fetch the title and description.
	Use automatic feed links to add feed links.
	Add a call to wp_head(). Plugins use this action hook to add their own scripts, stylesheets, and other functionality.

Here's an example of a correctly-formatted HTML5 compliant head area:

-->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>