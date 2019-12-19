UPDATE wp_options SET option_value = replace(option_value, '$oldDomainName', '$newDomainName') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET guid = replace(guid, '$oldDomainName','$newDomainName');
UPDATE wp_posts SET post_content = replace(post_content, '$oldDomainName', '$newDomainName');
UPDATE wp_postmeta SET meta_value = replace(meta_value,'$oldDomainName','$newDomainName');
