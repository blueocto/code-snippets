// Without CLASS change

$('#basketOverview').hide(); //The container to show when clicked
$('.btn_basket').click(function(){ //The button or link to slide open the above
	$('#basketOverview').slideToggle(function(){
	}); 
	return false;
});


// With CLASS change

$('#contactDetails').hide(); //The container to show when clicked
$('.btn_expand_contact').click(function(){ //The button or link to slide open the above
	$('.btn_expand_contact').toggleClass('opened'); //Adds a class when clicked, removes when clicked again
	$('#contactDetails').slideToggle(function(){
		if($('#contactDetails').is(":visible")){ //If the container is showing, change the text in the button
			$('.btn_expand_contact').text("Hide");
		} else { 
			$('.btn_expand_contact').text("Contact Details"); 
		};
	}); 
	return false;
});