<?php

// Specify the auto-save when writing

define('AUTOSAVE_INTERVAL', 600); // 60 * 10, auto-saves every 10 minutes

// Post Revisions : reduce or disable

define('WP_POST_REVISIONS', 5); // Maximum 5 revisions per post
define('WP_POST_REVISIONS', false); // Disable revisions

// Empty trash automatically

define('EMPTY_TRASH_DAYS', 5 ); // Empty trash every 5 days

// Remove p tags wrapped around imgs

// remove the p tag from around images (link or nor)
function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');