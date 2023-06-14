<?php
// function to get the category & subcategory of a blog

function getCategoryAndSubcategory($theCategories)
{
  foreach ($theCategories as $theCategory) {
    if ($theCategory->category_parent === 0) {
      $category = $theCategory->cat_name;
    } else {
      $subCategory = $theCategory->cat_name;
    }
  }
  return [$category, $subCategory];
} ?>