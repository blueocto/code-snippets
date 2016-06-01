//cycle
$jq('.your_div').cycle({ 
	fx:    'fade', 
	speed:  1000
});


// To add a coin / thumb driven nav...
$jq('.your_div').cycle({ 
	fx:    'fade', 
	speed:  1000,
	pager:  '.thumbs',
		
	// callback fn that creates a thumbnail to use as pager anchor 
	pagerAnchorBuilder: function(idx, slide) { 
		return '_insert_your_code_here_'; 
	}
});



// for numbered
// callback fn that creates a thumbnail to use as pager anchor 
pagerAnchorBuilder: function(idx, slide) { 
	var count = idx + 1;
	return '<a href="">'+count+'</a>';
}
