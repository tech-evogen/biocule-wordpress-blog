<?php

function custom_post_types()
{
  // products post type
  register_post_type("products", [
    "public" => true,
    "menu_icon" => "dashicons-products",
    "description" => "This custom post type contains details of the products",
    "show_in_rest" => true,
    //'has_archive' => false,
    // 'rewrite' => [
    //   'slug' => 'products'
    // ]
    //'supports' => ['title', 'editor']
    "labels" => [
      "name" => "Products",
      "add_new_item" => "Add New Product",
      "edit_item" => "Edit Product",
      "all_items" => "All Products",
      "singular_name" => "Product",
    ],
  ]);
}

add_action("init", "custom_post_types");
