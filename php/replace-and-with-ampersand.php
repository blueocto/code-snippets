<!-- Stop any &'s from a CMS outputting as & and not & - meaning they don't validate. -->

<?php str_replace('&', '&amp;', $item->item) ?>