$("#content1").show();

$(".tabs a").click(function() {
		//reset
	$(".content").hide();
	$(".tabs a").removeClass("active");
	//act
	$(this).addClass("active")
	var id = $(this).closest("li").attr("id").replace("tab","");
	$("#content" + id).show();
	return false;
});


/*** The HTML

<!-- PLACE TABS AFTER CONTENT IF YOU WANT THERE TO BE A GAP ON ACTIVE TAB -->

<ul class="tabs clearfix">
	<li id="tab1" class="active"><a>List Item 1</a></li>
	<li id="tab2"><a>List Item 2</a></li>
	<li id="tab3"><a>List Item 3</a></li>
</ul>

<div id="content1" class="content clearfix">
	<p>Content 1</p>
</div><!-- //tab_content -->

<div id="content2" class="content clearfix">
	<p>Content 2</p>            
</div><!-- //tab_content -->

<div id="content3" class="content clearfix">
	<p>Content 3</p>        
</div><!-- //tab_content -->

***/