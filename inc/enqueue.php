<?php

function blog_files()
{
  //below function call is to load google fonts i.e both Barlow & Barlow Semi Condensed
  wp_enqueue_style(
    "custom-google-fonts-semi",
    "//fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  );
  wp_enqueue_style(
    "custom-google-fonts",
    "//fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  );

  //below function call is to laod css files from css folder
  wp_enqueue_style(
    "full_blog_styles",
    get_template_directory_uri() . "/css/main.css",
    [],
    "1.0.0",
    "all"
  );

  //below function call is to laod js files from js folder
  if (is_single()) {
    wp_enqueue_script(
      "blog_carousel_script",
      get_template_directory_uri() . "/js/blogReading.js",
      null,
      null,
      true
    );
  }

  wp_enqueue_script(
    "blog_javascript_overall",
    get_template_directory_uri() . "/js/overall.js",
    null,
    null,
    true
  );

  wp_localize_script("blog_javascript_overall", "blogData", [
    "root_url" => get_site_url(),
    "nonce" => wp_create_nonce("wp_rest"),
  ]);
}

//below is the action defined with hook which will run to load the font, css & js defined in the above function
add_action("wp_enqueue_scripts", "blog_files");
