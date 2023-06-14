<?php

function blogShortDescription()
{
  $blogShortDescription = get_field("blog_short_description");
  $showBlogShortDescription =
    $blogShortDescription === null
      ? "Skin care can be quite tricky and it is not an issue that comes up once and goes away. You need to make sure you are constantly looking after your skin. Hence, we have come up with the exclusive bio:cule blogs."
      : $blogShortDescription;
  return $showBlogShortDescription;
}

?>