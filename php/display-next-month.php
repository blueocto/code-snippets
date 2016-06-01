<?php
	// instead of a number...

	$d = new DateTime( '2013-06-10' );
	$d->modify( 'first day of next month' );
	echo $d->format( 'F' ), "\n";
?>