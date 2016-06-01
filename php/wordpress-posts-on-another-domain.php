<!-- Essentially using the Feed to display posts. -->

<!-- 
	Make sure the feed is working on the desired Wordpress website

	Try going to /feed/ or /rss/

	If there is a problem, refer to this article : http://www.w3it.org/blog/wordpress-feed-error-output-solution-how-to/

-->

<!-- Once the feed is working, use this code to pull in -->

<?php
                                    
    $ch = curl_init("http://www.example.com/feed/");
                    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
                    
    $feed = curl_exec($ch);
    curl_close($ch);
    fclose($fp);
                    
    $xml = new SimpleXMLElement($feed);
            
    foreach($xml->channel->item as $post)
    {
        echo '<h4>'.$post->title.'</h4>';
    }
                    
?>

<!-- 
	elements...
	View source of the feed to pick and choose what you want to use, e.g.
-->

<?php

echo '<h4>'.$post->title.'</h4>';

echo '<p>'.$post->description.'</p>';

?>