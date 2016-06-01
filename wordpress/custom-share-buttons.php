<p class="sharing">
    <a class="share_btn" href="http://www.facebook.com/share.php?u=<?php print(urlencode(the_permalink())); ?>&title=<?php print(urlencode(the_title())); ?>" rel="external" title="Share on Facebook">Share</a>
    <a class="tweet_btn" href="http://twitter.com/home?status=<?php print(urlencode(the_title())); ?>+<?php print(urlencode(the_permalink())); ?>" rel="external" title="Share on Twitter">Tweet</a>
    <a class="google_btn" href="https://plus.google.com/share?url=<?php print(urlencode(the_permalink())); ?>" rel="external" title="Share on Google+">+1</a>
</p>