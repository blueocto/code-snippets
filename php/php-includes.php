<?php include $_SERVER['DOCUMENT_ROOT'].'/inc/hdr.php'; ?>

<!-- Add unique title to included header -->

<?php
$title = "About Us";
include "header.php";
?>

<h2><?php echo $title; ?></h2>

//then in your header.php file

<title><?php echo $title; ?></title>

//this will be unique to every page


<!-- Get the root so as to not have to type /xhtml/ -->

//Before your stylesheets etc, in header
<?php $dir = $_SERVER['REQUEST_URI']; ?>

//Examples for styles, scripts and images
<link rel="stylesheet" href="<?php echo $dir; ?>css/base.css">

<script src="<?php echo $dir; ?>js/script.js"></script>

//Example of include
<?php include $_SERVER['DOCUMENT_ROOT'] . $dir . 'inc/meta.php'; ?>