$(document).ready(function() {

	/************************/
	// Filter Posts AJAX
	/************************/

	function setActiveProperty(element) {
		//check to see if its the 'all'
		if(element.classList.contains('is-default')) {
			//remove active class from all property filters
			var selectedProperties = document.querySelectorAll('.property-filter.selected');
			Array.from(selectedProperties).forEach(function(e,i) {
				e.classList.remove('selected');
			});
		}else{
			//if its another filter, remove the all filter
			document.querySelector('.is-default.property-filter').classList.remove('selected');
		}
		

		//set active state on current property
		if(element.classList.contains('selected')) {
			//already active, remove
			element.classList.remove('selected');
		}else{
			element.classList.add('selected');
		}

		filterProperties();
		
	}

	function setActiveArea(element) {
		//check to see if its the 'all'
		if(element.classList.contains('is-default')) {
			//remove active class from all area filters
			var selectedProperties = document.querySelectorAll('.area-filter.selected');
			Array.from(selectedProperties).forEach(function(e,i) {
				e.classList.remove('selected');
			});
		}else{
			//if its another filter, remove the all filter
			document.querySelector('.is-default.area-filter').classList.remove('selected');
		}
		//set active state on current area
		if(element.classList.contains('selected')) {
			//already active, remove
			element.classList.remove('selected');
		}else{
			element.classList.add('selected');
		}

		filterProperties();
		
	}

	function setFilterListeners() {
		var propertyFilters = document.getElementsByClassName('property-filter');
		Array.from(propertyFilters).forEach(function(e,i) {
			e.addEventListener('click', function(){setActiveProperty(this)});
			e.addEventListener('change', function(){setActiveProperty(this)});
			e.addEventListener('keyup', function(){setActiveProperty(this)});
			e.addEventListener('keydown', function(){setActiveProperty(this)});
		});
		var areaFilters = document.getElementsByClassName('area-filter');
		Array.from(areaFilters).forEach(function(e,i) {
			e.addEventListener('click', function(){setActiveArea(this)});
			e.addEventListener('change', function(){setActiveArea(this)});
			e.addEventListener('keyup', function(){setActiveArea(this)});
			e.addEventListener('keydown', function(){setActiveArea(this)});
		});
	}

	setFilterListeners();


	/************************/
	// Filter Posts AJAX
	/************************/

	function filterProperties() {
		var propertyIds = [];
		var areaIds = [];

		var selectedProperties = document.querySelectorAll('.property-filter.selected');
		selectedProperties.forEach(function(prop,i) {
			propertyIds.push(prop.getAttribute('data-ptype-id'));
		});
		
		var selectedAreas = document.querySelectorAll('.area-filter.selected');
		selectedAreas.forEach(function(area,i) {
			areaIds.push(area.getAttribute('data-atype-id'));
		});

		console.log(propertyIds);
		console.log(areaIds);

		// console.log(ajaxurl);
		$.ajax({
			url: mine_params.ajaxurl,
			data: {
				action: 'myfilter',
				property: propertyIds,
				area: areaIds
			}, // form data
			type:'POST', // POST
			beforeSend:function(xhr){
				// filter.find('button').text('Processing...'); // changing the button label
				console.log('before send');
			},
			success:function(res){
				console.log('success');
				console.log(res);
				// filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(res); // insert data
			}
		});			
	}
});