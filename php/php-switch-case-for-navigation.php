<!--
	Adds an "active" class to menu items, on static website, to allow you to change the active state in CSS.
-->

<?php

    $url = $_SERVER['REQUEST_URI'];
    
    switch($url){
    
        case('/'):
        case('/home.php'):
            $active[0] = ' class="active"';
        break;

        case('/about.php'):
            $active[1] = ' class="active"';
        break;

        case('/portfolio.php'):
            $active[2] = ' class="active"';
        break;
        
        case('/services.php'):
            $active[3] = ' class="active"';
        break;
    
        case('/contact.php'):
            $active[4] = ' class="active"';
        break;
    
    }

?>

<ul>
    <li<?= $active[0] ?>><a href="#">Home</a></li>
        <li<?= $active[1] ?>><a href="#">About</a></li>
        <li<?= $active[2] ?>><a href="#">Portfolio</a></li>
        <li<?= $active[3] ?>><a href="#">Services</a></li>
        <li<?= $active[4] ?>><a href="#">Contact</a></li>
</ul>