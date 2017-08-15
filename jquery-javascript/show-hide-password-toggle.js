// Show/hide password onClick of button using Javascript only
// https://stackoverflow.com/questions/31224651/show-hide-password-onclick-of-button-using-javascript-only
function show() {
	var p = document.getElementById('your-password');
	p.setAttribute('type', 'text');
	$('#eye').removeClass().addClass( 'eye-show' );
}

function hide() {
	var p = document.getElementById('your-password');
	p.setAttribute('type', 'password');
	$('#eye').removeClass().addClass( 'eye-hide' );
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
	if (pwShown == 0) {
		pwShown = 1;
		show();
	} else {
		pwShown = 0;
		hide();
	}
}, false);

/***

<div class="show-hide">
	<input id="your-password" type="password" class="show-hide" placeholder="Password" required>
	<button id="eye" class="eye-show" aria-hidden="true"></button>
</div>

***/

// Or use this simpler jQuery version

$('#eye').on("click", function(e) {
	e && e.preventDefault();
	if ($('#your-password').attr("type") == "password") {
		$('#your-password').attr("type","text");
		$(this).removeClass("eye-show").addClass("eye-hide");
	} else {
		$(this).removeClass("eye-hide").addClass("eye-show");
		$('#your-password').attr("type","password");
	}
});