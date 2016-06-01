//swap images
$(".thumb").click(function(){
	var $targetimage = $(this).find('img');
	$('#image img').attr('src', $targetimage.attr('src'));
	//return false | activate if you don't want the page jump
});


/* In your HTML 

<!-- main large image container -->
<div id="image">
	<img src="images/image1.jpg" alt="" />
</div>

<!-- thumbnail clicks -->
<div id="thumbs">
	<a class="thumb" href="#">
		<img src="images/image1.jpg" />
	</a>
	<a class="thumb" href="#">
		<img src="images/image2.jpg" />
	</a>
</div>

*/