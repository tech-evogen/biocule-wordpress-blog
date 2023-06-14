<?php

function blog_features()
{
  register_nav_menu("stickyMenu", "Sticky Menu");
}

add_action("after_setup_theme", "blog_features");