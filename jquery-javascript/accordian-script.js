// first define the word/button you are clicking on - adding a class is optional
$nn('#accordion dt h3').addClass('closed');
// hide all the divs (or definitions) beneath this to start with
	$nn('#accordion dd').hide();
//here we say when you click the word/button do xyz...
	$nn('#accordion dt h3').click(function(){
//here we are removing all active classes from other buttons
		$nn('#accordion dt h3').removeClass('open').addClass('closed');
//here we are assigning an active class to the specific button we clicked
		$nn(this).removeClass('closed').addClass('open');
//here we are telling any open divs to close
		$nn('#accordion dd').slideUp();
//here we are telling the one below our button to slide down
		$nn(this).parent().next().slideDown();
//here we are preventing anything in the href from actioning
		return false;
	});


/* Some sample code to start with

<dl id="accordion" class="accordion">
	<dt><h3>Heading></h3></dt>
	<dd>Some text here</dd>
	
	<dt><h3>Heading></h3></dt>
	<dd>Some text here</dd>
	
	<dt><h3>Heading></h3></dt>
	<dd>Some text here</dd>
	
	<dt><h3>Heading></h3></dt>
	<dd>Some text here</dd>
</dl><!-- //accordion -->

*/