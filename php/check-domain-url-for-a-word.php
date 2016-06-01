<p>
<?php 
	$host = "cramlington"; // Your Sub domain (cramlington.yourdomain.com)

	$url = basename($_SERVER['HTTP_HOST']);

	echo $url;
?>
</p>

<p>
<?php 
	if (stristr($url, $host)) {
	echo "Hello you're on " . $host;
	}
	else { 
	echo "not on " . $host;
	}
?>
</p>