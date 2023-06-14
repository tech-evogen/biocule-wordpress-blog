<?php
// function to get the image url & alt attribute of a image associated with a blog
function getImageUrlAlt($pageBannerImage)
{
  if ($pageBannerImage["url"] === null) {
    $imageSrcUrl = get_theme_file_uri(
      "/assets/blog-fallback-testing-image.jpg"
    );
  } else {
    $imageSrcUrl = $pageBannerImage["url"];
  }

  if ($pageBannerImage["alt"] === null || $pageBannerImage["alt"] === "") {
    $imageAltText = "this is the alt text to be used as the fallback";
  } else {
    $imageAltText = $pageBannerImage["alt"];
  }

  return [$imageSrcUrl, $imageAltText];
}

?>